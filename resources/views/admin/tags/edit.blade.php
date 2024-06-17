@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Tag</h1>
    <form action="{{ route('tags.update', $tag->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Tag Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $tag->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
