@extends('layouts.app')

@section('title','Home')

@section('content')
    <!-- Barta Create Post Card -->
    <form
        action="{{ route('posts.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6 space-y-3">
        @csrf
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
                  rows="2"
                  placeholder="What's going on, {{ auth()->user()->name ?? '' }}?"></textarea>
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
                        Post
                    </button>
                    <!-- /Post Button -->
                </div>
            </div>
            <!-- /Card Bottom Action Buttons -->
        </div>
        <!-- /Create Post Card Bottom -->
    </form>
    <!-- /Barta Create Post Card -->

    <div>
        @if(session()->has('toast'))
            {{ session('toast.message') }}
        @endif
    </div>

    <section
        id="newsfeed"
        class="space-y-6 relative">

        @if($feeds->count() > 0)
            @foreach($feeds as $feed)
                <article class="bg-white border-2 border-black rounded-lg shadow mx-auto max-w-none px-4 py-5 sm:px-6">
                    <!-- Barta Card Top -->
                    <header>
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-3">
                                <!-- User Avatar -->
                                <div class="flex-shrink-0">
                                    <img class="h-10 w-10 rounded-full object-cover"
                                         src="https://avatars.githubusercontent.com/u/61485238" alt="Al Nahian">
                                </div>
                                <!-- /User Avatar -->

                                <!-- User Info -->
                                <div class="text-gray-900 flex flex-col min-w-0 flex-1">
                                    <a href="{{ route('profile.show',$feed->author->username ?? '') }}"
                                       class="hover:underline font-semibold line-clamp-1">
                                        {{ $feed->author?->name ?? '' }}
                                    </a>

                                    <a href="{{ route('profile.show',$feed->author->username ?? '') }}"
                                       class="hover:underline text-sm text-gray-500 line-clamp-1">
                                        {{ '@'.$feed->author->username ?? '' }}
                                    </a>
                                </div>
                                <!-- /User Info -->
                            </div>

                            <!-- Card Action Dropdown -->
                            @if(auth()->id() === $feed->author->id)
                                <div class="flex flex-shrink-0 self-center" x-data="{ open: false }">
                                    <div class="relative inline-block text-left">
                                        <div>
                                            <button @click="open = !open" type="button"
                                                    class="-m-2 flex items-center rounded-full p-2 text-gray-400 hover:text-gray-600"
                                                    id="menu-0-button">
                                                <span class="sr-only">Open options</span>
                                                <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor"
                                                     aria-hidden="true">
                                                    <path
                                                        d="M10 3a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM10 8.5a1.5 1.5 0 110 3 1.5 1.5 0 010-3zM11.5 15.5a1.5 1.5 0 10-3 0 1.5 1.5 0 003 0z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                        <!-- Dropdown menu -->
                                        <div x-show="open" @click.away="open = false"
                                             class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
                                             role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button"
                                             tabindex="-1" style="display: none;">
                                            <a href="{{ route('posts.edit',$feed->id) }}"
                                               class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                               role="menuitem" tabindex="-1" id="user-menu-item-0">Edit</a>

                                            <form action="{{ route('posts.destroy',$feed->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    type="submit"
                                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 w-full text-left"
                                                    onclick="confirm('Do you really want to delete this post?') !== true ? event.preventDefault() : ''"
                                                    role="menuitem" tabindex="-1" id="user-menu-item-1">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <!-- /Card Action Dropdown -->
                        </div>
                    </header>

                    <!-- Content -->
                    <a href="{{ route('posts.show',$feed->id) }}">
                    </a>
                    <div class="py-4 text-gray-700 font-normal">
                        <a href="{{ route('posts.show',$feed->id) }}">
                        </a>
                        <p>
                            <a href="{{ route('posts.show',$feed->id) }}">
                                {!! $feed->content_markdown ?? '' !!}
                            </a>
                        </p>
                    </div>


                    <!-- Date Created & View Stat -->
                    <div class="flex items-center gap-2 text-gray-500 text-xs my-2">
                        <span class="">{{ $feed->created_at->diffForHumans() }}</span>
                        <span class="">•</span>
                        <span>{{ $feed->view_count }} views</span>
                    </div>

                    <!-- Barta Card Bottom -->
                    <footer class="border-t border-gray-200 pt-2">
                        <!-- Card Bottom Action Buttons -->
                        <div class="flex items-center justify-between">
                            <div class="flex gap-8 text-gray-600">
                                <!-- Comment Button -->
                                <a href="./single.html" type="button"
                                   class="-m-2 flex gap-2 text-xs items-center rounded-full p-2 text-gray-600 hover:text-gray-800">
                                    <span class="sr-only">Comment</span>
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                         stroke-width="2"
                                         stroke="currentColor" class="w-5 h-5">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M12 20.25c4.97 0 9-3.694 9-8.25s-4.03-8.25-9-8.25S3 7.444 3 12c0 2.104.859 4.023 2.273 5.48.432.447.74 1.04.586 1.641a4.483 4.483 0 01-.923 1.785A5.969 5.969 0 006 21c1.282 0 2.47-.402 3.445-1.087.81.22 1.668.337 2.555.337z"></path>
                                    </svg>

                                    <p>{{ $feed->comment_count }}</p>
                                </a>
                                <!-- /Comment Button -->
                            </div>
                        </div>
                        <!-- /Card Bottom Action Buttons -->
                    </footer>
                    <!-- /Barta Card Bottom -->
                </article>
            @endforeach
        @endif

        @if($feeds->hasPages())
            <div class="sticky bottom-2 md:bottom-5 bg-gray-900 rounded-md bg-clip-padding backdrop-filter backdrop-blur-md bg-opacity-10 border border-gray-100 px-3 py-2 rounded">
                {{ $feeds->render() }}
            </div>
        @endif

    </section>

@endsection

