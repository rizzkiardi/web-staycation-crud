<footer id="contact" class="bg-gray-800 text-white py-10 mt-10">
    <div class="container mx-auto px-6 flex justify-between">
        
        <div>
            <a href="{{ route('home') }}" class="flex items-center hover:cursor-pointer">
                {{-- <img src="/images/logo.png" class="w-10" alt="Logo"> --}}
                <span class="text-2xl font-bold">Staycation</span>
            </a>
        </div>

        <div>
            <h4 class="font-semibold mb-3">Sitemap</h4>
            <ul class="text-gray-300 space-y-1">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="#featured">Featured</a></li>
                <li><a href="#story">Story</a></li>
            </ul>
            
        </div>

        <div>
            <h4 class="font-semibold mb-3">Contact</h4>
            <p class="text-gray-300">Email: support@staycation.com</p>
            <p class="text-gray-300">Phone: +62 811-2345-678</p>
        </div>
    </div>
</footer>
