@extends('auth.layouts.app')

@section('title','Verify Email')

@section('content')
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
        @include('auth.layouts.partials.header')

        <h1
            class="mt-10 text-center text-2xl font-bold leading-9 tracking-tight text-gray-900">
            Verify your email address
        </h1>
        <p class="mt-6 text-center text-sm text-gray-600">
            We've sent you a verification link to your email address. Please check your inbox and click on the link to
            complete your registration.
        </p>

        <div x-data="{wait:true,sec:120}"
             x-init="let interval = setInterval(()=>{if(0>=sec){clearInterval(interval);wait=false}else{sec = sec -1; }},1000)"
             class="mt-10">
            <form action="{{ route('verification.send') }}" method="POST">
                @csrf
                <button
                    type="submit"
                    class="flex w-full justify-center rounded-md bg-black px-3 py-1.5 text-sm font-semibold leading-6 text-white shadow-sm hover:bg-black focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-black disabled:bg-neutral-500 disabled:cursor-not-allowed"
                    x-bind:disabled="wait" x-text="wait ? 'Resend in: '+sec+'s' : 'Resend'">
                    Resend
                </button>
            </form>
        </div>
    </div>
@endsection

