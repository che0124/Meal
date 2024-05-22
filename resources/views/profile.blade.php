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
    <h1 class="page-title">個人檔案</h1>
    <div class="profilebackround">
        姓名：{{$user->name}}
    </div>
    <br>
    <div class="profilebackround">
        電子郵件：{{$user->email}}
    </div>

    <div class="modify">
        <form action="{{ route('modify', ['user' => $user]) }}" method="GET">
            <input type="submit" value="修改資料" id="modify">
        </form>
    </div>
</div>

@endsection