@extends('auth.layouts.app')

@section('title','Login')

@section('content')
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        @include('auth.layouts.partials.header')

        <h1
            class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
            Sign in to your account
        </h1>
    </div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        @if(session()->has('status'))
            <div class="block bg-violet-100 p-3 mb-3">
                <p class="text font-semibold text-gray-600">{{ session('status') }}</p>
            </div>
        @endif
        <form class="space-y-6" action="{{ route('login') }}" method="POST">
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

            <div>
                <div class="flex items-center justify-between">
                    <label
                        for="password"
                        class="block text-sm font-medium leading-6 text-gray-900"
                    >Password</label
                    >
                    <div class="text-sm">
                        <a
                            href="{{ route('password.request') }}"
                            class="font-semibold text-black hover:text-black"
                        >Forgot password?</a
                        >
                    </div>
                </div>
                <div class="mt-2">
                    <input
                        id="password"
                        name="password"
                        type="password"
                        placeholder="••••••••"
                        class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6"/>
                </div>
                <x-forms.error name="password"/>
            </div>

            <div>
                <button
                    type="submit"
                    class="flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                    Sign in
                </button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
            Don't have an account yet?
            <a
                href="{{ route('register') }}"
                class="font-semibold leading-6 text-black hover:text-black"
            >Sign Up</a
            >
        </p>
    </div>
@endsection
