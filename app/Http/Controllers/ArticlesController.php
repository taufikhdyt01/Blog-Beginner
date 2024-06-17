<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Tag;
use App\Models\Category;
use App\Models\ArticleTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArticlesController extends Controller
{
    public function index()
    {
        $articles = Article::with('category', 'tags', 'user')->get();

        return view('pages.articles.index', compact('articles'));
    }

    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();

        return view('pages.articles.create', compact('categories', 'tags'));
    }

    public function show(Article $article)
    {
        $article->load('category', 'tags', 'user');
        return view('pages.articles.detail', compact('article'));
    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        try {
            $tags = [];

            foreach($request['tags'] as $tag)
            {
                $tags[] = Tag::where('name', '=', $tag)->first();
            }

            $category = Category::where('name', '=', $request['category'])->first();

            if (!$category)
            {
                return redirect()->route('articles.show')->with("failed', 'Failed create new article. Category doesn't exists");
            }

            $fileName = time().'.'.$request->image->extension();

            $request->image->move(public_path('images'), $fileName);

            $data['image'] = 'images/'. $fileName;
            $data['user_id'] = auth()->user()->id;
            $data['category_id'] = $category->id;

            DB::beginTransaction();

            $article = Article::create($data);

            foreach($tags as $tag)
            {
                $data = [
                    'article_id' => $article->id,
                    'tag_id' => $tag->id
                ];

                ArticleTag::create($data);
            }

            DB::commit();

            return redirect()->route('articles.show')->with('success', 'Successfully create new article');
        } catch(\Exception $e) {
            error_log("[ARTICLE CONTROLLER] " . $e->getMessage());
            DB::rollBack();
            return redirect()->route('articles.show')->with('failed', 'Failed create new article');
        }

    }

    public function edit(Article $article)
    {
        $tags = Tag::all();
        $categories = Category::all();

        return view('pages.articles.edit', compact('article', 'tags', 'categories'));
    }

    public function update(Request $request, Article $article)
    {

        $data = $request->validate($this->rulesV2());

        try {

            if ($request['category'] != $article->category->name)
            {
                $category = Category::where('name', '=', $request['category'])->first();

                if (!$category)
                {
                    return redirect()->route('articles.show')->with("failed', 'Failed create new article. Category doesn't exists");
                }

                $data['category_id'] = $category->id;
            }

            if ($request->image)
            {
                $fileName = time().'.'.$request->image->extension();

                $request->image->move(public_path('images'), $fileName);

                $data['image'] = 'images/'. $fileName;

                $oldFile = public_path($article->image);

                if (file_exists($oldFile))
                {
                    unlink($oldFile);
                }
            }

            DB::beginTransaction();

            if ($request['tags'])
            {
                foreach($request['tags'] as $tag)
                {
                    $tagModel = Tag::where('name', '=', $tag)->first();

                    if(!$tagModel)
                    {
                        continue;
                    }

                    ArticleTag::create(
                        [
                        'article_id' => $article->id,
                        'tag_id' => $tagModel->id
                        ]
                    );
                }
            }

            $article->fill($data)->save();

            DB::commit();

            return redirect()->route('articles.show')->with('success', 'Successfully update article');

        } catch (\Exception $e) {
            error_log("[ARTICLE CONTROLLER] " . $e->getMessage());
            DB::rollBack();
            return redirect()->route('articles.show')->with('failed', 'Failed create new article');
        }
    }

    public function delete(Article $article)
    {
        $article->delete();

        return redirect()->route('articles.show')->with('success', 'Successfully delete article');
    }

    public function deleteTag(Article $article, Tag $tag)
    {
        ArticleTag::where('article_id', '=', $article->id)
        ->where('tag_id', '=', $tag->id)
        ->first()->delete();

        return redirect()->back();
    }

    private function rules()
    {
        return [
            'title' => 'required|min:3|max:255',
            'full_text' => 'required|min:5|max:1000',
            'category' => 'required',
            'image' => 'required|file|mimes:jpg,png,jpeg'
        ];
    }

    private function rulesV2()
    {
        return [
            'title' => 'required|min:3|max:255',
            'full_text' => 'required|min:5|max:1000',
        ];
    }
}
