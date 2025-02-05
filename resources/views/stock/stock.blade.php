@extends('app')
@section('content')
<div class="content" style="display:flex; flex-direction: column; width: 80vw;">
    <h1>STOK SAYFASI</h1>
    <a href="{{route('categories.create')}}">Kategori Ekle</a>
    <a href="{{route('products.create')}}">Ürün Ekle</a>
    <table border="1">
        <tr>
            <th>Ürün Adı</th>
            <th>Kategori</th>
            <th>Stok</th>
            <th>Fiyat</th>
            <th>İşlemler</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>{{ $product->category->name }}</td>
                <td>{{ $product->stock }}</td>
                <td>{{ $product->price }} TL</td>
                <td style="display: flex">
                    <a style="flex: 1" href="{{ route('products.edit', $product) }}">Düzenle</a> |
                    <form style="flex: 2" action="{{ route('products.destroy', $product) }}" method="POST"
                        style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Sil</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</div>
@endsection