<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Tüm kategorileri listele.
     */
    public function index()
    {
        $categories = Category::all();
        return view('categories.category', compact('categories'));
    }

    /**
     * Yeni kategori oluşturma formunu göster.
     */
    public function create()
    {
        return view('categories.add-category');
    }

    /**
     * Yeni bir kategori ekle.
     */
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

    /**
     * Belirtilen kategoriyi göster.
     */
    public function show(Category $category)
    {
        return view('categories.category', compact('category'));
    }

    /**
     * Kategoriyi düzenleme formunu göster.
     */
    public function edit(Category $category)
    {
        return view('categories.edit-category', compact('category'));
    }

    /**
     * Kategoriyi güncelle.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name,' . $category->id,
        ]);

        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Kategori başarıyla güncellendi.');
    }

    /**
     * Kategoriyi sil.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Kategori başarıyla silindi.');
    }
}
