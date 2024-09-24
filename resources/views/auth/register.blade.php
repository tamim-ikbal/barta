@extends('auth.layouts.app')

@section('title','Register')

@section('content')
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        @include('auth.layouts.partials.header')

        <h1
            class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
            Create a new account
        </h1>
    </div>
    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
        <form
            class="space-y-6"
            action="{{ route('register') }}"
            method="POST">
            @csrf
            <!-- Name -->
            <div>
                <label
                    for="name"
                    class="block text-sm font-medium leading-6 text-gray-900"
                >Name</label
                >
                <div class="mt-2">
                    <input
                        id="name"
                        name="name"
                        type="text"
                        autocomplete="first_name"
                        placeholder="Alp"
                        class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6"/>
                </div>
                <x-forms.error name="name"/>
            </div>

            <!-- Username -->
            <div>
                <label
                    for="username"
                    class="block text-sm font-medium leading-6 text-gray-900"
                >Username</label
                >
                <div class="mt-2">
                    <input
                        id="username"
                        name="username"
                        type="text"
                        autocomplete="username"
                        placeholder="alparslan1029"
                        class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6"/>
                </div>
                <x-forms.error name="username"/>
            </div>

            <!-- Email -->
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
                        placeholder="alp.arslan@mail.com"
                        class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6"/>
                </div>
                <x-forms.error name="email"/>
            </div>

            <!-- Password -->
            <div>
                <label
                    for="password"
                    class="block text-sm font-medium leading-6 text-gray-900"
                >Password</label
                >
                <div class="mt-2">
                    <input
                        id="password"
                        name="password"
                        type="password"
                        autocomplete="current-password"
                        placeholder="••••••••"
                        class="block w-full rounded-md border-0 p-2 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6"/>
                </div>
                <x-forms.error name="password"/>
            </div>

            <div>
                <button
                    type="submit"
                    class="flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                    Register
                </button>
            </div>
        </form>

        <p class="mt-10 text-center text-sm text-gray-500">
            Already a member?
            <a
                href="{{ route('login') }}"
                class="font-semibold leading-6 text-black hover:text-black"
            >Sign In</a
            >
        </p>
    </div>
@endsection

