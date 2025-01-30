@extends('app')
@section('content')
<form action="{{route('register')}}" method="post">
    @csrf
    <h1>REGİSTER</h1>
    <input type="text" name="name" placeholder="User Name">
    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">
    <button type="submit">Register</button>
</form>
@endsection