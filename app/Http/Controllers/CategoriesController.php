<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);

        return view('pages.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('pages.categories.create');
    }

    public function show(Category $category)
    {

    }

    public function store(Request $request)
    {
        $data = $request->validate($this->rules());

        Category::create($data);

        return redirect()->route('categories.show')->with('success', 'Successfully create new category');
    }

    public function edit(Category $category)
    {
        return view('pages.categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate($this->rules());

        $category->fill($data)->save();

        return redirect()->route('categories.show')->with('success', 'Successfully update category');
    }

    public function delete(Category $category)
    {
        $category->delete();

        return redirect()->route('categories.show')->with('success', 'Successfully delete category');
    }

    private function rules()
    {
        return [
            'name' => 'required|min:3|max:255'
        ];
    }
}
