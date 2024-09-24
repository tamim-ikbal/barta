@extends('auth.layouts.app')

@section('title','Forgot Password')

@section('content')
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        @include('auth.layouts.partials.header')

        <div class="mb-10 mt-5">
            <h3
                class=" text-center text-xl font-bold leading-9 tracking-tight text-gray-900">
                Forgot your password?
            </h3>
            <p class="text-center text-sm text-gray-600">No worries, just enter you email and hit on the button
                bellow.</p>
        </div>

        @if(session()->has('status'))
            <div class="block bg-violet-100 p-3 mb-3">
                <p class="text font-semibold text-gray-600">{{ session('status') }}</p>
            </div>
        @endif
        <form action="{{ route('password.email') }}" method="POST">
            @csrf
            <div>
                <label
                    for="email"
                    class="block text-sm font-medium leading-6 text-gray-900"
                >Email address</label
                >
                <div class="mt-2">
                    <input
                        id="email"
                        name="email"
                        type="email"
                        autocomplete="email"
                        placeholder="bruce@wayne.com"
                        class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6"/>
                </div>
                <x-forms.error name="email"/>
            </div>

            <div class="mt-5">
                <button
                    type="submit"
                    class="flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                    Send Password Reset Link
                </button>
            </div>
        </form>

    </div>
@endsection

