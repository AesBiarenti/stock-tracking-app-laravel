@extends('app')
@section('content')
    <h1>Yeni Ürün Ekle</h1>
    <form action="{{ route('products.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Ürün Adı" required>
        <input type="number" name="stock" placeholder="Stok Miktarı" required>
        <input type="number" name="price" placeholder="Fiyat" step="0.01" required>
        <select name="category_id" required>
            <option value="">Kategori Seç</option>
            @foreach(App\Models\Category::all() as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
        <button type="submit">Kaydet</button>
    </form>
@endsection
