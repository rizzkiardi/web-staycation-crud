<section id="featured" class="container mx-auto px-6 py-12">
    <h2 class="text-3xl font-bold mb-6">Featured Places</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($featured as $hotel)
        <div class="bg-white shadow rounded-lg overflow-hidden">
            <img src="{{ asset('storage/' . $hotel->image) }}" class="w-full h-56 object-cover">
            <div class="p-4">
                <h3 class="text-xl font-semibold">{{ $hotel->name }}</h3>
                <p class="text-gray-600">{{ $hotel->location }}</p>
                <p class="text-blue-600 font-bold mt-2">Rp {{ number_format($hotel->price) }} / malam</p>
            </div>
        </div>
        @endforeach
    </div>
</section>
