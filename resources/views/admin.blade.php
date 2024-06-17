@extends('layouts.app')

@section('content')
<style>
    .admin-dashboard {
        background-color: #f7f9fc;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }
    .admin-dashboard h1 {
        font-family: 'Poppins', sans-serif;
        font-weight: 700;
        color: #333;
        margin-bottom: 20px;
    }
    .admin-dashboard ul {
        list-style-type: none;
        padding: 0;
    }
    .admin-dashboard li {
        margin-bottom: 15px;
    }
    .admin-dashboard a {
        display: block;
        text-decoration: none;
        color: #fff;
        background: linear-gradient(135deg, #72edf2 10%, #5151e5 100%);
        padding: 15px 20px;
        border-radius: 8px;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        transition: transform 0.2s ease-in-out, box-shadow 0.2s ease-in-out;
    }
    .admin-dashboard a:hover {
        transform: translateY(-5px);
        box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    }
    .admin-dashboard a i {
        margin-right: 10px;
    }
</style>
<div class="container">
    <div class="admin-dashboard">
        <h1>Admin Dashboard</h1>
        <ul>
            <li>
                <a href="{{ route('categories.index') }}">
                    <i class="fas fa-list-alt"></i> Manage Categories
                </a>
            </li>
            <li>
                <a href="{{ route('tags.index') }}">
                    <i class="fas fa-tags"></i> Manage Tags
                </a>
            </li>
            <li>
                <a href="{{ route('articles.index') }}">
                    <i class="fas fa-newspaper"></i> Manage Articles
                </a>
            </li>
        </ul>
    </div>
</div>
@endsection
