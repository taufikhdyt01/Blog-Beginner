@extends('layouts.app')

@section('content')
<style>
    .card {
        border: none;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        height: 100%; /* Ensure the card takes up the full height of the column */
    }
    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }
    .card-img-top {
        height: 200px; /* Fixed height for consistency */
        width: 100%; 
        object-fit: cover; /* Ensures the image covers the area without distorting */
        transition: transform 0.2s ease-in-out;
    }
    .card:hover .card-img-top {
        transform: scale(1.05);
    }
    .card-body {
        flex: 1; /* Ensure the card body takes up the remaining space */
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }
    .card-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: #333;
        margin-bottom: 15px;
    }
    .card-text {
        font-family: 'Poppins', sans-serif;
        color: #555;
        flex-grow: 1; /* Allow the card text to grow and take up the available space */
    }
    .btn-primary {
        background-color: #5151e5;
        border: none;
        font-family: 'Poppins', sans-serif;
        transition: background-color 0.2s ease-in-out;
        align-self: flex-start; /* Align the button to the start of the flex container */
    }
    .btn-primary:hover {
        background-color: #3333cc;
    }
</style>
<div class="container">
    <div class="row">
        @foreach($articles as $article)
        <div class="col-md-4 mb-4">
            <div class="card">
                <img src="{{ $article->image }}" class="card-img-top" alt="{{ $article->title }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <p class="card-text">{{ Str::limit($article->full_text, 100) }}</p>
                    <a href="{{ route('article.show', $article->id) }}" class="btn btn-primary">Read More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
