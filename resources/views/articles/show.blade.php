@extends('layouts.app')

@section('content')
<style>
    .article-container {
        background: linear-gradient(to right, #ece9e6, #ffffff);
        padding: 40px;
        border-radius: 15px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .article-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
    }
    .article-image {
        max-height: 500px;
        object-fit: cover;
        border-radius: 15px;
        margin-bottom: 20px;
        width: 100%;
    }
    .article-text {
        font-family: 'Poppins', sans-serif;
        color: #555;
        line-height: 1.6;
    }
</style>
<div class="container">
    <div class="article-container">
        <h1 class="article-title">{{ $article->title }}</h1>
        <img src="{{ $article->image }}" class="img-fluid article-image" alt="{{ $article->title }}">
        <p class="article-text">{{ $article->full_text }}</p>
    </div>
</div>
@endsection
