<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        $categories = Category::all();
        return view('categories.category', compact('categories'));
    }

    public function create()
    {
        return view('categories.add-category');
    }

 
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        Category::create([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Kategori başarıyla eklendi.');
    }

 
    public function show(Category $category)
    {
        return view('categories.category', compact('category'));
    }


    public function edit(Category $category)
    {
        return view('categories.edit-category', compact('category'));
    }


    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Kategori başarıyla güncellendi.');
    }

 
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori başarıyla silindi.');
    }
}
