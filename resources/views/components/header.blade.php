@props(['user'])
<header class="border border-b-gray-300">
    <div class="container mx-auto px-6 py-4 flex justify-between items-center">
        <div class="flex items-center gap-3">
            <a href="/" class="flex items-center hover:cursor-pointer">
                {{-- <img src="/images/logo.png" class="w-10" alt="Logo"> --}}
                <span class="text-xl font-bold">Staycation</span>
            </a>
        </div>

        <nav class="flex gap-6 text-gray-700 font-medium items-center">
            @auth
                <a href="{{ route('home') }}" class="text-sm hover:cursor-pointer">Home</a>
                <a href="{{ route('hotels.index') }}" class="text-sm hover:cursor-pointer">Hotels</a>
                <button id="dropdownInformationButton" data-dropdown-toggle="dropdownInformation" class="inline-flex items-center justify-center text-gray-700  font-medium leading-5 rounded-base  " type="button">
                {{ Auth::user()->username }}
                <svg class="w-4 h-4 ms-1.5 -me-0.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 9-7 7-7-7"/></svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownInformation" class="z-10 hidden bg-neutral-primary-medium border border-default-medium rounded-base shadow-lg w-72">
                    <div class="p-2">
                    <div class="flex items-center px-2.5 p-2 space-x-1.5 text-sm bg-neutral-secondary-strong rounded">
                        <img class="w-8 h-8 rounded-full" src="{{ asset('assets/images/image-default.png') }}" alt="Rounded avatar">
                        <div class="text-sm">
                        <div class="font-medium text-heading">{{ Auth::user()->name }}</div>
                        <div class="truncate text-body">{{ Auth::user()->email }}</div>
                        </div>
                    </div>
                    </div>
                    <ul class="px-2 pb-2 text-sm text-body font-medium" aria-labelledby="dropdownInformationButton">
                    <li>
                        <a href="{{ route('dashboard') }}" class="inline-flex items-center w-full p-2 hover:bg-neutral-tertiary-medium hover:text-heading rounded">
                        <img src="{{ asset('assets/icons/dashboard.png') }}" alt="Icon dashboard" class="w-4 h-4 me-1.5">
                        My Dashboard
                        </a>
                    </li>
                    
                    <li class="border-t border-default-medium pt-1.5">
                        <form action="{{ route('signout') }}" method="POST">
                            @csrf
                            <button type="submit" class="inline-flex items-center w-full p-2 text-fg-danger hover:bg-neutral-tertiary-medium rounded">
                            <svg class="w-4 h-4 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 12H8m12 0-4 4m4-4-4-4M9 4H7a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h2"/></svg>
                            Sign out</button>
                        </form>
                    </li>
                    </ul>
                </div>

                @else
                <a href="/" class="text-sm hover:cursor-pointer">Home</a>
                <a href="#featured" class="text-sm hover:cursor-pointer">Featured</a>
                <a href="#story" class="text-sm hover:cursor-pointer">Story</a>
                <a href="#contact" class="text-sm hover:cursor-pointer">Contact</a>
                <a href="{{ route('register') }}" class="bg-blue-600 text-white text-sm px-4 py-2 rounded-lg shadow-lg ">Create Acccount</a>
            @endauth
        </nav>
    </div>
</header>