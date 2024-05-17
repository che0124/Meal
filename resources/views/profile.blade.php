@extends('layouts.app')
<script>
window.onload = function() {
    var userlightLogo = document.getElementById('userlightLogo');
    if (userlightLogo) {
        userlightLogo.src = "http://localhost:8080/Meal/public/images/profile%20%E6%B7%B12.svg";
    }
};
</script>
@section('content')
<div class="container">
    <h1 class="page-title">個人檔案</h1>
    {{$user->name}} <br>
    {{$user->email}}
</div>
@endsection