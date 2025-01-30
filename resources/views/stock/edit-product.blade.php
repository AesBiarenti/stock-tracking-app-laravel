@extends('app')
@section('content')
    <h1>Ürünü Güncelle</h1>
    <form action="{{ route('products.update', $product) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $product->name }}" required>
        <input type="number" name="stock" value="{{ $product->stock }}" required>
        <input type="number" name="price" value="{{ $product->price }}" step="0.01" required>
        <select name="category_id" required>
            @foreach(App\Models\Category::all() as $category)
                <option value="{{ $category->id }}" @if($category->id == $product->category_id) selected @endif>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <button type="submit">Güncelle</button>
    </form>
@endsection
