<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Tag;
use App\Models\Category;

class PageController extends Controller
{
    public function dashboard()
    {
        $data = [
            [
                'name' => 'Total Article',
                'count' => Article::count(),
            ],
            [
                'name' => 'Total Tag',
                'count' => Tag::count(),
            ],
            [
                'name' => 'Total Category',
                'count' => Category::count(),
            ],
        ];

        return view('dashboard', compact('data'));
    }

    public function home(Request $request)
    {
        $articles = Article::with('tags', 'user', 'category')->latest()->filter($request->toArray())->paginate(6);
        $tags = Tag::all();
        $categories = Category::all();

        return view('pages.home.home', compact('articles', 'tags', 'categories'));
    }

    public function about()
    {
        return view('pages.home.about');
    }
}
