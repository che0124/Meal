@extends('layouts.app')
<script>
    window.onload = function () {
        var userlightLogo = document.getElementById('userlightLogo');
        if (userlightLogo) {
            userlightLogo.src = "http://localhost:8080/Meal/public/images/profile%20%E6%B7%B12.svg";
        }
    };
</script>
@section('content')
<div class="container">
    <h1 class="page-title">修改資料</h1>
    <form action="{{ route('update') }}" method="POST">
        @csrf
        <label for="name">姓名：</label>
        <input type="text" id="name" name="name" value="">
        <br><br>
        <label for="email">電子郵件：</label>
        <input type="email" id="email" name="email" value="">
        <br><br>
        <input type="submit" value="確認">
    </form>
</div>

@endsection