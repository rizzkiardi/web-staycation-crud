@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10">

    <div class="flex justify-between mb-5">
        <h1 class="text-2xl font-bold">List Hotel</h1>
        <a href="{{ route('hotels.create') }}" class="bg-blue-600 text-white px-4 py-1 rounded">
            + Add Hotel
        </a>
    </div>

    @if(session('success'))
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

    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border-2 border-default-medium">
        <table class="w-full text-sm text-left rtl:text-right text-body">
            <thead class="bg-neutral-secondary-soft border-b border-default">
                <tr>
                    <th scope="col" class="px-6 py-3 font-medium text-md text-heading">
                        Name
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-md text-heading">
                        Price
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-md text-heading">
                        Location
                    </th>
                    <th scope="col" class="px-6 py-3 font-medium text-md text-heading text-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                @forelse($hotels as $hotel)
                <tr class="odd:bg-neutral-primary even:bg-neutral-secondary-soft border-b border-default">
                    <td class="px-6 py-4">
                        {{ $hotel->name }}
                    </td>
                    <td class="px-6 py-4">
                        Rp {{ number_format($hotel->price) }}
                    </td>
                    <td class="px-6 py-4">
                        {{ $hotel->location }}
                    </td>
                    <td class="px-6 py-4 md:flex md:gap-3 justify-center">     
                        <a href="{{ route('hotels.show', $hotel->id) }}" class="font-medium text-gray-900 hover:underline">Detail</a>
                        <a href="{{ route('hotels.edit', $hotel->id) }}" class="font-medium text-fg-brand hover:underline">Edit</a>
                        <form class="inline" action="{{ route('hotels.destroy', $hotel->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <button type="button" data-modal-target="popup-modal" data-modal-toggle="popup-modal" class="text-red-600 cursor-pointer hover:underline">
                                Delete
                            </button>

                            <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                <div class="relative p-4 w-full max-w-md max-h-full">
                                    <div class="relative bg-neutral-primary-soft border border-default rounded-base shadow-sm p-4 md:p-6">
                                            <button type="button" class="absolute top-3 end-2.5 text-body bg-transparent hover:bg-neutral-tertiary hover:text-heading rounded-base text-sm w-9 h-9 ms-auto inline-flex justify-center items-center" data-modal-hide="popup-modal">
                                                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18 17.94 6M18 18 6.06 6"/></svg>
                                                <span class="sr-only">Close modal</span>
                                            </button>
                                        <div class="p-4 md:p-5 text-center">
                                            <svg class="mx-auto mb-4 text-fg-disabled w-12 h-12" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24"><path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 13V8m0 8h.01M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"/></svg>
                                            <h3 class="mb-6 text-body">Are you sure you want to delete this Hotel?</h3>
                                            <div class="flex items-center space-x-4 justify-center">
                                                <button data-modal-hide="popup-modal" type="submit" class="text-white bg-danger box-border border border-transparent hover:bg-danger-strong focus:ring-4 focus:ring-danger-medium shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">
                                                Yes, I'm sure
                                                </button>
                                                <button data-modal-hide="popup-modal" type="button" class="text-body bg-neutral-secondary-medium box-border border border-default-medium hover:bg-neutral-tertiary-medium hover:text-heading focus:ring-4 focus:ring-neutral-tertiary shadow-xs font-medium leading-5 rounded-base text-sm px-4 py-2.5 focus:outline-none">No, cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-3 text-center">No products available</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

</div>
@endsection
