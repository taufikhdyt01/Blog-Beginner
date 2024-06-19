<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Edit Article
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 pt-6">
                    <label for="" class="text-lg">Article Tags</label>
                    <div class="flex">
                        @forelse($article->tags as $tag)
                        <form action="{{ route('articles.tag.delete', [$article->id, $tag->id]) }}" class="flex" method="POST">
                            @csrf
                            @method('DELETE')
                            <p class="bg-blue-500 text-white px-2 py-1 rounded-l-md">{{$tag->name}}</p>
                            <button type="submit" class="bg-red-500 text-white rounded-r-md px-2 py-1">Delete Tag</button>
                        </form>
                        @empty
                        <p>Article doesnt't have any tags</p>
                        @endforelse
                    </div>
                </div>
                <form class="px-6 pt-4 py-6 text-gray-900" action="{{ route('articles.update', $article->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3 w-full">
                        <label for="title" class="text-lg">Title</label>
                        <input
                            type="text"
                            name="title"
                            id="title"
                            placeholder="Fill article title"
                            class="w-full rounded-lg border border-l-gray-500"
                            required
                            value="{{ $article->title }}"
                        >
                        @error('title')
                        <span class="block text-red-500">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 w-full">
                        <label for="title" class="text-lg">Category</label>
                        <select name="category" id="" class="w-full rounded-lg border border-l-gray-500" >
                            <option value="{{ $article->category->name }}"class="hidden">{{ $article->category->name }}</option>
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
                        <label for="title" class="text-lg">Available Tag</label>
                        <select name="tags[]" id="my-select" class="w-full rounded-lg border border-l-gray-500" multiple>
                            <option value="" default="Choose tag" class="hidden">Choose Tag</option>
                            @foreach($tags as $tag)
                            @if(!$article->tags->contains($tag))
                            <option value="{{ $tag->name }}">{{ $tag->name }}</option>
                            @endif
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
                        >{{ $article->full_text }}</textarea>
                        @error('full_text')
                        <span class="block text-red-500">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 w-full">
                        <img src="{{ asset($article->image) }}" alt="">
                        <label for="image" class="text-lg">Image</label>
                        <input
                            type="file"
                            name="image"
                            id="image"
                            class="w-full rounded-lg border border-gray-500 py-2 px-4"
                            value="{{ $article->image }}"
                        >
                        @error('image')
                        <span class="block text-red-500">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="bg-green-500 text-white px-3 py-1.5 rounded-lg">
                            Update Article
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
