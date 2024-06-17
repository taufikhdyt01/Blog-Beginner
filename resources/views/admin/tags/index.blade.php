@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Manage Tags</h1>
    <a href="{{ route('tags.create') }}" class="btn btn-primary">Add New Tag</a>
    <table class="table mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tags as $tag)
            <tr>
                <td>{{ $tag->id }}</td>
                <td>{{ $tag->name }}</td>
                <td>
                    <a href="{{ route('tags.edit', $tag->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('tags.destroy', $tag->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
