@extends('layouts.app')

@section('content')
<style>
    .container {
        background: linear-gradient(to right, #ece9e6, #ffffff);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 40px;
    }
    .page-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
    }
    .btn-primary {
        background-color: #5151e5;
        border: none;
        font-family: 'Poppins', sans-serif;
        transition: background-color 0.2s ease-in-out;
    }
    .btn-primary:hover {
        background-color: #3333cc;
    }
    .btn-warning {
        background-color: #ffc107;
        border: none;
        font-family: 'Poppins', sans-serif;
        transition: background-color 0.2s ease-in-out;
    }
    .btn-warning:hover {
        background-color: #e0a800;
    }
    .btn-danger {
        background-color: #dc3545;
        border: none;
        font-family: 'Poppins', sans-serif;
        transition: background-color 0.2s ease-in-out;
    }
    .btn-danger:hover {
        background-color: #c82333;
    }
</style>
<div class="container">
    <h1 class="page-title">Manage Articles</h1>
    <a href="{{ route('articles.create') }}" class="btn btn-primary mb-3">Add New Article</a>
    <table class="table">
        <thead class="thead-light">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($articles as $article)
            <tr>
                <td>{{ $article->id }}</td>
                <td>{{ $article->title }}</td>
                <td>
                    <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('articles.destroy', $article->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm ml-1" onclick="return confirm('Are you sure you want to delete this article?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
