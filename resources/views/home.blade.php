@extends('layouts.app')
<script>
window.onload = function() {
    var homelightLogo = document.getElementById('homelightLogo');
    if (homelightLogo) {
        homelightLogo.src = "http://localhost:8080/Meal/public/images/home%20%E6%B7%B1.svg";
    }
};
</script>
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