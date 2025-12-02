@extends('layouts.app')

@section('content')
<div class="container mx-auto px-6 py-10 lg:w-3/4">
    <h1 class="text-2xl font-bold mb-5">Edit Hotel</h1>

    <form method="POST" action="{{ route('hotels.update', $hotel->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <img id="preview" class="mt-3 h-32 hidden">

        <div class="shadow-md bg-white p-5 rounded-base border-2 border-default-medium mb-6">
            <div class="mb-4">
                <label for="name" class="block font-medium mb-1 text-sm text-heading">Name</label>
                <input type="text" id="name" name="name" value="{{ $hotel->name }}" class="w-3/4 px-4 py-2 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded focus:ring-brand focus:border-brand block p-3.5 shadow-xs" required>
                @error('name')
                    <span class="text-red-500 italic invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-4">
                <label for="price" class="block font-medium mb-1 text-sm text-heading">Price per Night</label>
                <input type="text" id="price" name="price" value="{{ $hotel->price }}" class="w-3/4 px-4 py-2 bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded focus:ring-brand focus:border-brand block p-3.5 shadow-xs" required>
                @error('price')
                    <span class="text-red-500 italic invalid-feedback">{{ $message }}</span>
                @enderror
            </div>
                    
            <div class="mb-4">
                <label for="location" class="block mb-1 text-sm font-medium text-heading">Location</label>
                <textarea name="location" id="location" rows="4" class="bg-neutral-secondary-medium border border-default-medium text-heading text-sm rounded-base focus:ring-brand focus:border-brand block w-full p-3.5 shadow-xs placeholder:text-body" placeholder="Write your location here...">{{ old('location', $hotel->location) }}</textarea>
                @error('location')
                    <span class="text-red-500 italic invalid-feedback">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col items-center w-full">
                <label id="dropzone" for="dropzone-file" class="flex flex-col items-center justify-center w-full h-74 bg-neutral-secondary-medium border border-dashed border-default-strong rounded-base cursor-pointer hover:bg-neutral-tertiary-medium">
                    <div id="preview-area" class="hidden flex-col items-center justify-center">
                        <img id="preview-image" src="" class="w-30 h-30 object-cover rounded-lg mb-2" />
                        <p id="preview-name" class="text-sm text-heading font-medium"></p> 
                    </div>

                    <div id="dropzone-text" class="flex flex-col items-center justify-center text-body pt-5 pb-6">
                        <svg class="w-8 h-8 mb-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" viewBox="0 0 24 24">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h3a3 3 0 0 0 0-6h-.025a5.56 5.56 0 0 0 .025-.5A5.5 5.5 0 0 0 7.207 9.021C7.137 9.017 7.071 9 7 9a4 4 0 1 0 0 8h2.167M12 19v-9m0 0-2 2m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs">jpeg, jpg, png (max 1Mb)</p>
                    </div>

                    {{-- preview --}}
                    <div id="preview-area" class="flex flex-col items-center justify-center {{ $hotel->image ? '' : 'hidden' }}">
                        <img 
                            id="preview-image" 
                            src="{{ asset('storage/' . $hotel->image) }}"
                            class="w-30 h-30 object-cover rounded-lg mb-2" 
                        />
                    </div>

                    <input id="dropzone-file" type="file" name="image" class="hidden" accept="image/*" value="{{ $hotel->image }}">
                </label>
            </div>

            <button type="submit" class="my-4 text-white bg-brand box-border border border-transparent hover:bg-brand-strong focus:ring-4 focus:ring-brand-medium shadow-xs font-medium leading-5 rounded-base text-sm px-6 py-1 focus:outline-none">Edit</button>
        </div>
    </form>
</div>

    <script>
        const dropzone = document.getElementById('dropzone');
        const fileInput = document.getElementById('dropzone-file');
        const previewArea = document.getElementById('preview-area');
        const previewImage = document.getElementById('preview-image');
        const previewName = document.getElementById('preview-name');
        const dropzoneText = document.getElementById('dropzone-text');

        function showPreview(file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                previewImage.src = e.target.result;
                previewName.textContent = file.name;
                previewArea.classList.remove('hidden');   
                dropzoneText.classList.add('hidden');
            };
            reader.readAsDataURL(file);
        }

        dropzone.addEventListener('dragover', function(e) {
            e.preventDefault();
            dropzone.classList.add('bg-neutral-tertiary-medium');
        });

        dropzone.addEventListener('dragleave', function() {
            dropzone.classList.remove('bg-neutral-tertiary-medium');
        });

        dropzone.addEventListener('drop', function(e) {
            e.preventDefault();
            dropzone.classList.remove('bg-neutral-tertiary-medium');

            const file = e.dataTransfer.files[0];
            fileInput.files = e.dataTransfer.files;

            if (file) {
                showPreview(file);
            }
        });

        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                showPreview(file);
            }
        });
    </script>
@endsection
