@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10">

    <div class="flex justify-between mb-5">
        <h1 class="text-3xl font-bold">List Hotel</h1>
        <a href="{{ route('hotels.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded">
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

    <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default">
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
                    <th scope="col" class="px-6 py-3 font-medium text-md text-heading">
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
                    <td class="px-6 py-4">
                        <a href="{{ route('hotels.edit', $hotel->id) }}" class="font-medium text-fg-brand hover:underline">Edit</a>
                        <form class="inline" action="{{ route('hotels.destroy', $hotel->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="text-red-600 ml-3" onclick="return confirm('Yakin ingin hapus?')">
                                Delete
                            </button>
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
