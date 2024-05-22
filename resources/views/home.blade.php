@extends('layouts.app')
<script>
window.onload = function() {
    var homelightLogo = document.getElementById('homelightLogo');
    if (homelightLogo) {
        homelightLogo.src = "http://localhost:8080/Meal/public/images/home%20%E6%B7%B1%E7%89%88.svg";
    }
};
</script>
@section('content')
    <div class="container">
        <h1 class="page-title">{{ __('Home Page!') }}</h1>
    </div>
@endsection
