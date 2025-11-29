@extends('layouts.auth')

@section('title', 'Login')

@section('content')
    

    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow">
        @if(session()->has('success'))
        <div id="alert-3" class="flex sm:items-center p-4 mb-4 text-sm text-fg-success-strong rounded-base bg-success-soft" role="alert">
            <div class="ms-2 text-sm ">
                {{ session('success') }}
            </div>
            <button type="button" class="ms-auto -mx-1.5 -my-1.5 rounded focus:ring-2 focus:ring-success-medium p-1.5 hover:bg-success-medium inline-flex items-center justify-center h-8 w-8 shrink-0 shrink-0" data-dismiss-target="#alert-3" aria-label="Close">
                <span class="sr-only">Close</span>
                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/></svg>
            </button>
        </div>
        @endif
        <h2 class="text-2xl font-bold text-center mb-6">Login to your Account</h2>
        @if (session()->has('loginError'))
            <div class="mx-auto p-4 mb-4 text-sm text-fg-danger-strong rounded-base bg-danger-soft" role="alert">
                <p class="font-medium">{{ session('loginError') }}</p> 
                <p>Change a few things up and try submitting again.</p>
            </div>
        @endif

        <form action="{{ route('login.authenticate') }}" method="POST">
            @csrf
            <div class="mb-5">
                <label for="username" class="block mb-2.5 text-sm font-medium text-heading">Username</label>
                <input 
                    type="text" 
                    id="username"
                    name="username" 
                    value="{{ old('username') }}"
                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                    autofocus required
                >
                @error('username')
                    <span class="text-red-500 italic invalid-feedback">{{  $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="password" class="block mb-2.5 text-sm font-medium text-heading">Password</label>
                <input 
                    type="password" 
                    id="password"
                    name="password"
                    class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body"
                    required
                >
                @error('password')
                    <span class="text-red-500 italic">{{  $message }}</span>
                @enderror
            </div>

            <div  class="flex items-center justify-end mb-5">
                <p class="ms-2 text-sm font-medium text-heading select-none">Don't have an account yet?
                <a href="{{ route('register') }}" class="text-fg-brand hover:underline">Register</a></p>
            </div>

            <button 
                type="submit" 
                class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">
                Login
            </button>
        </form>
    </div>
@endsection
