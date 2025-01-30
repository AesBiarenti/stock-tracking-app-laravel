@extends('app')
@section('content')
    <h1>Kategoriyi Güncelle</h1>
    <form action="{{ route('categories.update', $category) }}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="name" value="{{ $category->name }}" required>
        <button type="submit">Güncelle</button>
    </form>
@endsection
