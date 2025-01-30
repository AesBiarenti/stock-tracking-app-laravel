@extends('app')
@section('content')
    <h1>Yeni Kategori Ekle</h1>
    <form action="{{ route('categories.store') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Kategori Adı" required>
        <button type="submit">Kaydet</button>
    </form>
@endsection
