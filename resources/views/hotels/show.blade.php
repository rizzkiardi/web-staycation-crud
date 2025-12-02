@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10 lg:w-3/4">
    <h1 class="text-2xl font-bold mb-6">Detail Hotel</h1>

    <div class="shadow-md bg-white p-5 rounded-base border-2 border-default-medium mb-6">
        <div class="flex gap-10 items-center">
            <div>
                <div class="mb-4">
                    @if($hotel->image)
                        <img src="{{ asset('storage/'.$hotel->image) }}" 
                            alt="Hotel Image" 
                            class="w-64 rounded-lg shadow mb-6">
                    @else
                        <p class="text-gray-500">Picture Not Found</p>
                    @endif
                </div>
            </div>
            <div>
                <div class="mb-4">
                    <label class="font-semibold">Hotel</label>
                    <p>{{ $hotel->name }}</p>
                </div>
        
                <div class="mb-4">
                    <label class="font-semibold">Location</label>
                    <p>{{ $hotel->location }}</p>
                </div>
        
                <div class="mb-4">
                    <label class="font-semibold">Price</label>
                    <p>Rp {{ number_format($hotel->price, 0, ',', '.') }}</p>
                </div>
            </div>
        </div>
    </div>
    <a href="{{ route('hotels.index') }}"  class="bg-blue-600 text-white px-4 py-1 my-6 rounded">         
        Back
    </a>
</div>
@endsection
