<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between self-center items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Categories
            </h2>
            <a class="bg-blue-500 text-white py-1.5 px-3 rounded-lg" href="{{ route('categories.create') }}">
                Create Category
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-alert />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @forelse($categories as $category)
                    <div class="flex border border-gray-700 rounded-lg mb-1 px-4 py-2 justify-between items-center">
                        <div class="flex">
                            <p>{{ $loop->iteration }}</p>
                            <p class="ml-5">{{ $category->name }}</p>
                        </div>
                        <div class="flex">
                            <a href="{{ route('categories.edit', $category->id) }}" class="bg-green-500 text-white px-3 py-1.5 mx-1 rounded-lg">Update</a>
                            <form action="{{ route('categories.delete', $category->id) }}" class="mx-1" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white px-3 py-1.5 rounded-lg">Delete</button>
                            </form>
                        </div>
                    </div>
                    @empty
                    <div class="container flex justify-center items-center">
                        <h1 class="text-lg">There is no categories yet</h1>
                    </div>
                    @endforelse
                </div>
                <div class="px-5 py-5">
                    {!! $categories->links() !!}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
