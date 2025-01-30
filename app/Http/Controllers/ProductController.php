<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index(){
        $userId = Auth::id();
        // $products = Product::with('category','user')->get();
        $products = Product::where('user_id',$userId)->get();
        return view('stock.stock',compact('products'));
    }
    public function create()
    {
        return view('stock.create-product');
    }
    public function store(Request $request){
        $request->validate([
            'name'=>'required|string|max:255',
            'category_id'=>'required|exists:categories,id',
            'stock'=>'required:integer:min:0',
            'price'=>'required:numeric:min:0'
        ]);
        Product::create([
            'name'=>$request->name,
            'category_id'=>$request->category_id,
            'stock'=>$request->stock,
            'price'=> $request->price,
            'user_id'=> Auth::id()//! Oturum açmış kullanıcının ID'sini ekliyoruz
        ]);
        return redirect()->back()->with('success','ürün eklendi');
    }
      /**
     * Belirtilen ürünü göster.
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Ürünü düzenleme formunu göster.
     */
    public function edit(Product $product)
    {
        return view('stock.edit-product', compact('product'));
    }

    /**
     * Ürünü güncelle.
     */
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
        ]);

        $product->update($request->all());

        return redirect()->route('products.index')->with('success', 'Ürün başarıyla güncellendi.');
    }

    /**
     * Ürünü sil.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Ürün başarıyla silindi.');
    }
}
