@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Admin Dashboard</h1>
    <ul>
        <li><a href="{{ route('categories.index') }}">Manage Categories</a></li>
        <li><a href="{{ route('tags.index') }}">Manage Tags</a></li>
        <li><a href="{{ route('articles.index') }}">Manage Articles</a></li>
    </ul>
</div>
@endsection
