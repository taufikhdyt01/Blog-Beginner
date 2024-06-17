<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Articles
            </h2>
            <a class="bg-blue-500 text-white py-1.5 px-3 rounded-lg" href="{{ route('articles.create') }}">
                Create Article
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <x-alert />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="grid lg:grid-cols-3 grid-cols-1 gap-5">
                        @foreach($articles as $article)
                        <div class="rounded-lg border border-gray-900 ">
                            <img src="{{ $article->image }}" alt="" class="rounded-t-lg">
                            <div class="px-4 py-2">
                                <div class="mb-5">
                                    <h1 class="text-xl font-semibold">{{ $article->title }}</h1>
                                    <p>Author : {{ $article->user->name }}</p>
                                    <p class="max-w-[50px]">
                                        {{ substr($article->full_text, 0, 50) }}...
                                    </p>
                                </div>
                                <div class="flex justify-between items-center">
                                    <p>{{ $article->created_at }}</p>
                                    <p class="bg-gray-400 text-black px-2 py-1 rounded-md">
                                        {{ $article->category->name }}
                                    </p>
                                </div>
                                <div class="flex items-center">
                                    <p class="text-lg">Tags : </p>
                                    @foreach($article->tags as $tag)
                                    <p class="bg-gray-400 text-black px-2 py-1 rounded-md mx-1">
                                        {{ $tag->name }}
                                    </p>
                                    @endforeach
                                </div>
                            </div>
                            <div class="flex w-full mb-8 px-4">
                                <a href="{{ route('articles.edit', $article->id) }}" class="bg-green-500 text-white px-3 py-1.5 mx-1 rounded-lg w-1/2 text-center" >Edit</a>
                                <form action="{{ route('articles.delete', $article->id) }}" class="mx-1 w-1/2" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white px-3 py-1.5 rounded-lg w-full">Delete</button>
                                </form>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
