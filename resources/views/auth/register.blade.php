@extends('layouts.auth')

@section('title', 'Register')

@section('content')
    <div class="w-full max-w-md bg-white p-8 rounded-xl shadow">
        <h2 class="text-2xl font-bold text-center mb-6">Register</h2>
        <form action="{{ route('register.store') }}" method="POST" class="max-w-sm mx-auto">
        @csrf
            <div class="mb-5">
                <label for="name" class="block mb-2.5 text-sm font-medium text-heading">Name</label>
                <input type="text" name="name" value="{{ old('name') }}" id="name" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body @error('name') is-invalid @enderror" placeholder=""  required/>
                @error('name')
                    <p class="mt-1 text-sm text-fg-danger-strong">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="username" class="block mb-2.5 text-sm font-medium text-heading">Username</label>
                <input type="text" name="username" value="{{ old('username') }}" id="username" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder=""  required/>
                @error('username')
                    <p class="mt-1 text-sm text-fg-danger-strong">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="email" class="block mb-2.5 text-sm font-medium text-heading">Email</label>
                <input type="email" name="email" value="{{ old('email') }}" id="email" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="email@example.com" required />
                @error('email')
                    <p class="mt-1 text-sm text-fg-danger-strong">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-5">
                <label for="password" class="block mb-2.5 text-sm font-medium text-heading">Password</label>
                <input type="password" name="password"  id="password" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded focus:ring-brand focus:border-brand block w-full px-3 py-2.5 shadow-xs placeholder:text-body" placeholder="••••••••" required />
                @error('password')
                    <p class="mt-1 text-sm text-fg-danger-strong">{{ $message }}</p>
                @enderror
            </div>
            <div  class="flex items-center justify-end mb-5">
                <p class="text-sm font-medium text-heading">Already have an account?
                <a href="{{ route('login') }}" class="text-fg-brand hover:underline">Login</a></p>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition">Register</button>
        </form>
    </div>
@endsection