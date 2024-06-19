<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Create New Article
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <form class="p-6 text-gray-900" action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3 w-full">
                        <label for="title" class="text-lg">Title</label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            placeholder="Fill article title"
                            class="w-full rounded-lg border border-l-gray-500"
                            required
                            value="{{ old('title') }}"
                        >
                        @error('title')
                        <span class="block text-red-500">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 w-full">
                        <label for="title" class="text-lg">Category</label>
                        <select name="category" id="" class="w-full rounded-lg border border-l-gray-500" required>
                            <option value="" default="Choose category" class="hidden">Choose Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('title')
                        <span class="block text-red-500">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 w-full">
                        <label for="title" class="text-lg">Tag</label>
                        <select name="tags[]" id="my-select" class="w-full rounded-lg border border-l-gray-500" required multiple>
                            <option value="" default="Choose tag" class="hidden">Choose Tag</option>
                            @foreach($tags as $tag)
                            <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                        @error('title')
                        <span class="block text-red-500">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 w-full">
                        <label for="full_text" class="text-lg">Description</label>
                        <textarea
                            type="text"
                            name="full_text"
                            id="full_text"
                            cols="30"
                            rows="10"
                            placeholder="Fill article description"
                            required
                            class="w-full rounded-lg border border-l-gray-500 resize-none"
                            value="{{ old('full_text') }}"
                        ></textarea>
                        @error('full_text')
                        <span class="block text-red-500">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 w-full">
                        <label for="image" class="text-lg">Image</label>
                        <input
                            type="file"
                            name="image"
                            id="image"
                            required
                            class="w-full rounded-lg border border-gray-500 py-2 px-4"
                            value="{{ old('image') }}"
                        >
                        @error('image')
                        <span class="block text-red-500">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="bg-green-500 text-white px-3 py-1.5 rounded-lg">
                            Add Article
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
