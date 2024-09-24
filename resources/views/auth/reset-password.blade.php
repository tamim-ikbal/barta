@extends('auth.layouts.app')

@section('title','Reset Password')

@section('content')
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        @include('auth.layouts.partials.header')

        <div class="mb-10 mt-5">
            <h3
                class=" text-center text-xl font-bold leading-9 tracking-tight text-gray-900">
                Reset your password.
            </h3>
            <p class="text-center text-sm text-gray-600">
                Please enter your password for: <strong>{{ request()->input('email') }}</strong>
            </p>
        </div>

        @if(session()->has('status'))
            <div class="block bg-violet-100 p-3 mb-3">
                <p class="text font-semibold text-gray-600">{{ session('status') }}</p>
            </div>
        @endif

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <input type="hidden" name="email" value="{{ request()->input('email') }}">
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
                        class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6"/>
                </div>
                <x-forms.error name="password"/>
            </div>
            <div class="mt-3">
                <label
                    for="password_confirmation"
                    class="block text-sm font-medium leading-6 text-gray-900"
                >Confirm Password</label
                >
                <div class="mt-2">
                    <input
                        id="password_confirmation"
                        name="password_confirmation"
                        type="password"
                        placeholder="••••••••"
                        class="block w-full rounded-md border-0 p-2 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-black sm:text-sm sm:leading-6"/>
                </div>
                <x-forms.error name="password_confirmation"/>
            </div>

            <div class="mt-5">
                <button
                    type="submit"
                    class="flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black">
                    Reset Password
                </button>
            </div>
        </form>

    </div>
@endsection

