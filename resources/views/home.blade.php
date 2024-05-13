@extends('layouts.app')

@section('content')
<div class="container">            
    @guest
        {{ __('Please login') }}
        <form action="{{ route('login') }}" method="GET">
            @csrf
            <input type="submit" value="login">
        </form>
        <form action="{{ route('register') }}" method="GET">
            @csrf
            <input type="submit" value="register">
        </form>
    @else
        {{ __('You are logged in!') }}
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <input type="submit" value="logout">
        </form> 
    @endguest
</div>
@endsection