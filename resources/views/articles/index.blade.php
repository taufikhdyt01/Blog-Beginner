@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        @foreach($articles as $article)
        <div class="col-md-4">
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
