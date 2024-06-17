<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('articles.index', compact('articles'));
    }

    public function indexAdmin()
    {
        $articles = Article::all();
        return view('admin.articles.index', compact('articles'));
    }


    public function manage()
    {
        $articles = Article::all();
        return view('admin.articles.manage', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.show', compact('article'));
    }

    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.articles.create', compact('categories', 'tags'));
    }

    public function crud()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.articles.crud', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {

        $admin = User::where('name', 'admin')->firstOrFail();

        $article = new Article();
        $article->title = $request->title;
        $article->full_text = $request->full_text;
        $article->image = $request->image;
        $article->category_id = $request->category_id;
        $article->user_id = $admin->id; 
        $article->save();

        $article->tags()->sync($request->tags);

        return redirect()->route('articles.index');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.articles.edit', compact('article', 'categories', 'tags'));
    }

    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $article->title = $request->title;
        $article->full_text = $request->full_text;
        $article->image = $request->image;
        $article->category_id = $request->category_id;
        $article->save();

        $article->tags()->sync($request->tags);

        return redirect()->route('articles.index');
    }

    public function destroy($id)
    {
        $article = Article::findOrFail($id);
        $article->delete();
        return redirect()->route('articles.index');
    }
}
