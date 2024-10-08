@extends('layouts.app')
@section('title','Post')
@section('content')

    @if(url()->previous() !== url()->current())
        <div class="mb-3 md:mb-5">
            <a
                href="{{ url()->previous() }}"
                class="-m-2 inline-flex gap-2 text-xs items-center rounded-full px-4 py-2 font-semibold bg-red-500 hover:bg-red-600 text-white fill-white transition duration-300">
                <svg id="fi_3545435" height="20" viewBox="0 0 32 32" width="20" xmlns="http://www.w3.org/2000/svg" data-name="Layer 2"><path d="m22 10.0005h-15.6973l3.252-2.1679a1 1 0 1 0 -1.1094-1.664l-6 4a1 1 0 0 0 0 1.664l6 4a1 1 0 0 0 1.1094-1.6641l-3.252-2.1685h15.6973a6 6 0 1 1 0 12h-15a1 1 0 1 0 0 2h15a8 8 0 1 0 0-15.9995z"></path></svg>
                Back
            </a>
        </div>
    @endif

    <div>
        @if(session()->has('toast'))
            {{ session('toast.message') }}
        @endif
    </div>
    <!-- Barta Create Post Card -->
    <form
        action="{{ route('posts.update',$post->id) }}"
        method="POST"
        enctype="multipart/form-data"
        class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6 space-y-3">
        @csrf
        @method('PUT')
        <!-- Create Post Card Top -->
        <div>
            <div class="flex items-start /space-x-3/">
                <!-- User Avatar -->
                <!--            <div class="flex-shrink-0">-->
                <!--              <img-->
                <!--                class="h-10 w-10 rounded-full object-cover"-->
                <!--                src="https://avatars.githubusercontent.com/u/831997"-->
                <!--                alt="Ahmed Shamim" />-->
                <!--            </div>-->
                <!-- /User Avatar -->

                <!-- Content -->
                <div class="text-gray-700 font-normal w-full">
              <textarea
                  class="block w-full p-2 pt-2 text-gray-900 rounded-lg border-none outline-none focus:ring-0 focus:ring-offset-0"
                  name="barta"
                  rows="5"
                  placeholder="What's going on, {{ auth()->user()->name ?? '' }}?">{{ $post->content }}</textarea>
                </div>
            </div>
            <x-forms.error name="barta"/>
        </div>

        <!-- Create Post Card Bottom -->
        <div>
            <!-- Card Bottom Action Buttons -->
            <div class="flex items-center justify-end">
                <!--            <div class="flex gap-4 text-gray-600">-->
                <!--              &lt;!&ndash; Upload Picture Button &ndash;&gt;-->
                <!--              <div>-->
                <!--                <input-->
                <!--                  type="file"-->
                <!--                  name="picture"-->
                <!--                  id="picture"-->
                <!--                  class="hidden" />-->

                <!--                <label-->
                <!--                  for="picture"-->
                <!--                  class="-m-2 flex gap-2 text-xs items-center rounded-full p-2 text-gray-600 hover:text-gray-800 cursor-pointer">-->
                <!--                  <span class="sr-only">Picture</span>-->
                <!--                  <svg-->
                <!--                    xmlns="http://www.w3.org/2000/svg"-->
                <!--                    fill="none"-->
                <!--                    viewBox="0 0 24 24"-->
                <!--                    stroke-width="1.5"-->
                <!--                    stroke="currentColor"-->
                <!--                    class="w-6 h-6">-->
                <!--                    <path-->
                <!--                      stroke-linecap="round"-->
                <!--                      stroke-linejoin="round"-->
                <!--                      d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909m-18 3.75h16.5a1.5 1.5 0 001.5-1.5V6a1.5 1.5 0 00-1.5-1.5H3.75A1.5 1.5 0 002.25 6v12a1.5 1.5 0 001.5 1.5zm10.5-11.25h.008v.008h-.008V8.25zm.375 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />-->
                <!--                  </svg>-->
                <!--                </label>-->
                <!--              </div>-->
                <!--              &lt;!&ndash; /Upload Picture Button &ndash;&gt;-->

                <!--              &lt;!&ndash; GIF Button &ndash;&gt;-->
                <!--              <button-->
                <!--                type="button"-->
                <!--                class="-m-2 flex gap-2 text-xs items-center rounded-full p-2 text-gray-600 hover:text-gray-800">-->
                <!--                <span class="sr-only">GIF</span>-->
                <!--                <svg-->
                <!--                  xmlns="http://www.w3.org/2000/svg"-->
                <!--                  fill="none"-->
                <!--                  viewBox="0 0 24 24"-->
                <!--                  stroke-width="1.5"-->
                <!--                  stroke="currentColor"-->
                <!--                  class="w-6 h-6">-->
                <!--                  <path-->
                <!--                    stroke-linecap="round"-->
                <!--                    stroke-linejoin="round"-->
                <!--                    d="M12.75 8.25v7.5m6-7.5h-3V12m0 0v3.75m0-3.75H18M9.75 9.348c-1.03-1.464-2.698-1.464-3.728 0-1.03 1.465-1.03 3.84 0 5.304 1.03 1.464 2.699 1.464 3.728 0V12h-1.5M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5z" />-->
                <!--                </svg>-->
                <!--              </button>-->
                <!--              &lt;!&ndash; /GIF Button &ndash;&gt;-->

                <!--              &lt;!&ndash; Emoji Button &ndash;&gt;-->
                <!--              <button-->
                <!--                type="button"-->
                <!--                class="-m-2 flex gap-2 text-xs items-center rounded-full p-2 text-gray-600 hover:text-gray-800">-->
                <!--                <span class="sr-only">Emoji</span>-->
                <!--                <svg-->
                <!--                  xmlns="http://www.w3.org/2000/svg"-->
                <!--                  fill="none"-->
                <!--                  viewBox="0 0 24 24"-->
                <!--                  stroke-width="1.5"-->
                <!--                  stroke="currentColor"-->
                <!--                  class="w-6 h-6">-->
                <!--                  <path-->
                <!--                    stroke-linecap="round"-->
                <!--                    stroke-linejoin="round"-->
                <!--                    d="M15.182 15.182a4.5 4.5 0 01-6.364 0M21 12a9 9 0 11-18 0 9 9 0 0118 0zM9.75 9.75c0 .414-.168.75-.375.75S9 10.164 9 9.75 9.168 9 9.375 9s.375.336.375.75zm-.375 0h.008v.015h-.008V9.75zm5.625 0c0 .414-.168.75-.375.75s-.375-.336-.375-.75.168-.75.375-.75.375.336.375.75zm-.375 0h.008v.015h-.008V9.75z" />-->
                <!--                </svg>-->
                <!--              </button>-->
                <!--              &lt;!&ndash; /Emoji Button &ndash;&gt;-->
                <!--            </div>-->

                <div>
                    <!-- Post Button -->
                    <button
                        type="submit"
                        class="-m-2 flex gap-2 text-xs items-center rounded-full px-4 py-2 font-semibold bg-gray-800 hover:bg-black text-white">
                        Update
                    </button>
                    <!-- /Post Button -->
                </div>
            </div>
            <!-- /Card Bottom Action Buttons -->
        </div>
        <!-- /Create Post Card Bottom -->
    </form>
    <!-- /Barta Create Post Card -->
@endsection
