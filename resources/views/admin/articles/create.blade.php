@extends('layouts.app')

@section('content')
<style>
    .form-container {
        background: linear-gradient(to right, #ece9e6, #ffffff);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        margin-top: 40px;
    }
    .form-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
    }
    .form-group label {
        font-family: 'Poppins', sans-serif;
        font-weight: 600;
        color: #333;
    }
    .form-control {
        font-family: 'Poppins', sans-serif;
        border-radius: 8px;
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
</style>
<div class="container">
    <div class="form-container">
        <h1 class="form-title">Create Article</h1>
        <form action="{{ route('articles.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="full_text">Full Text</label>
                <textarea class="form-control" id="full_text" name="full_text" rows="6" required></textarea>
            </div>
            <div class="form-group">
                <label for="image">Image URL</label>
                <input type="text" class="form-control" id="image" name="image" required>
            </div>
            <div class="form-group">
                <label for="category_id">Category</label>
                <select class="form-control" id="category_id" name="category_id" required>
                    @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="tags">Tags</label>
                <select class="form-control" id="tags" name="tags[]" multiple required>
                    @foreach($tags as $tag)
                    <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>
    </div>
</div>
@endsection
