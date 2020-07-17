<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }


    public function create()
    {
        return view('categories.create');
    }


    public function store(Request $request)
    {
        $data = request()->validate([
            'name' => 'required|unique:categories,name'
        ]);
        $category = Category::create($data);

        session()->flash('Category-Added', ' Category was added Successfully !');

        return redirect('/category');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, Category $category)
    {
        $data = request()->validate([
            'name' => 'required|unique:categories,name'
        ]);

        $category->update($data);

        session()->flash('Category-Updated', ' Category was Updated Successfully !');

        return redirect('/category');
    }

    public function destroy(Category $category)
    {
        $category->Product()->delete();
        $category->delete();
        session()->flash('Category-deleted', ' a Category and its products were deleted Successfully !');

        return redirect('/category');
    }
}