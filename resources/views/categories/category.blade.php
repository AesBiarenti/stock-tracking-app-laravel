@extends('app')
@section('content')
    <h1>Kategori Listesi</h1>
    <a href="{{ route('categories.create') }}">Yeni Kategori Ekle</a>
    <table border="1">
        <tr>
            <th>Kategori Adı</th>
            <th>İşlemler</th>
        </tr>
        @foreach($categories as $category)
            <tr>
                <td>{{ $category->name }}</td>
                <td>
                    <a href="{{ route('categories.edit', $category) }}">Düzenle</a> |
                    <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Sil</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
