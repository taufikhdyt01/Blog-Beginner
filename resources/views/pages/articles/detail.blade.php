<x-user-layout>
    <div class="py-12">
        <div class="flex justify-center items-center bg-center mb-5">
            <img src="{{ asset($article->image) }}" alt="" class="max-w-5xl">
        </div>
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                <h1 class="text-2xl">{{ $article->title }}</h1>
                <p>By : {{ $article->user->name }}</p>
                <div class="h-1 bg-gray-800 w-full">
                </div>
                <p>
                    {{ $article->full_text }}
                </p>
                <div class="flex justify-between items-center">
                    <p>{{ $article->created_at }}</p>
                    <p class="bg-red-500 text-white px-2 py-1 rounded-md group-hover:bg-white group-hover:text-red-600">
                        {{ $article->category->name }}
                    </p>
                </div>
                <div class="flex items-center">
                    <p class="text-lg">Tags : </p>
                    @foreach($article->tags as $tag)
                    <p class="bg-red-500 text-white px-2 py-1 rounded-md mx-1 group-hover:bg-white group-hover:text-red-600">
                        {{ $tag->name }}
                    </p>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-user-layout>
