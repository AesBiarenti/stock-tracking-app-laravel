@extends('app')
@section('content')
    <form action="{{route('login')}}" method="post">
        @csrf
        <h1>LOGİN</h1>
        <input type="email" name="email" placeholder="Email">
        <input type="password" name="password" placeholder="Password">
        <button type="submit">Login</button>
        <a href="{{route('go-register')}}">Not login yet? Register</a>
    </form>
@endsection