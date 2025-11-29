<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'Staycation') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body>
    <x-header :user="$user"/>

    @if ($user)
        <h1 class="container mx-auto my-[50px] text-4xl px-6">Welcome, {{ Auth::user()->name }}</h1>
    @endif

    <main >
        <div class="container mx-auto px-6">
            <di class="flex gap-5">
                <h2>Add your Hotel here..</h2>
                <a href="{{ route('hotels.create') }}" class="underline">Add Hotel</a>
            </div>
        </div>
    </main>

    <x-footer/>





    <script src="https://cdn.jsdelivr.net/npm/flowbite@4.0.1/dist/flowbite.min.js"></script>
</body>
</html>