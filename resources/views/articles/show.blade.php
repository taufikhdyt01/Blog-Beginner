@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $article->title }}</h1>
    <img src="{{ $article->image }}" class="img-fluid" alt="{{ $article->title }}">
    <p>{{ $article->full_text }}</p>
</div>
@endsection
