<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::paginate(10);

        return view('pages.tags.index', compact('tags'));
    }

    public function create()
    {
        return view('pages.tags.create');
    }

    public function show(Tag $tag)
    {

    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        Tag::create($data);

        return redirect()->route('tags.show')->with('success', 'Successfully create new tag');
    }

    public function edit(Tag $tag)
    {
        return view('pages.tags.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag)
    {
        $data = $request->validate($this->rules());

        $tag->fill($data)->save();

        return redirect()->route('tags.show')->with('success', 'Successfully update tag');
    }

    public function delete(Tag $tag)
    {
        $tag->delete();

        return redirect()->route('tags.show')->with('success', 'Successfully delete tag');
    }

    private function rules()
    {
        return [
            'name' => 'required|min:3|max:255'
        ];
    }
}
