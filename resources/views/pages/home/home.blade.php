<x-user-layout>
    <div class="py-12">
        <div class="flex justify-center bg-[url(https://thewilddetectives.com/wp-content/uploads/2020/05/Reading.jpg)] h-[600px] bg-no-repeat items-center bg-center mb-5">
            <h1 class="text-white text-3xl font-bold p-5">
                Explore the World of Ideas with Our Blog WebApp
            </h1>
        </div>
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-10">
                <div class="">
                    <form action="{{ route('home') }}" class="flex">
                        <input type="text" placeholder="Search for article" class="rounded-md w-2/5 mr-1" name="article" value="{{ request('article') }}">
                        <input type="text" placeholder="Search by tag" class="rounded-md w-1/5 mx-1" name="tag" value="{{ request('tag') }}">
                        <select name="category" id="" class="w-1/5 rounded-md mx-1">
                            @if(request('category'))
                            <option value="{{ request('category') }}" class="hidden">{{ request('category') }}</option>
                            @else
                            <option value="" class="hidden">Category</option>
                            @endif
                            <option value="" >All Category</option>
                            @foreach($categories as $category)
                            <option value="{{ $category->name }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <button class="w-1/5 bg-blue-500 text-white rounded-md ml-1" type="submit">Search</button>
                    </form>
                </div>
                <div class="mt-5">
                    @if(empty($articles))
                    <div class="flex justify-center items-center p-20">
                        <h1 class="text-3xl text-red-500">There is no article yet</h1>
                    </div>
                    @else
                    <div class="grid lg:grid-cols-3 grid-cols-1 gap-5">
                        @foreach($articles as $article)
                            <div class="rounded-lg border border-gray-900 group hover:bg-red-600 duration-300 ease-in-out hover:text-white hover:cursor-pointer"
                            onclick="location.href='{{ route('articles.detail', $article->id) }}'">
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
                        @endforeach
                        </div>
                    @endif
                </div>
                {!! $articles->links() !!}
            </div>
        </div>
    </div>
</x-user-layout>
