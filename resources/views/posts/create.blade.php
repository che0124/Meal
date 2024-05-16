@extends('layouts.app')
<script>
window.onload = function() {
    var createlightLogo = document.getElementById('createlightLogo');
    if (createlightLogo) {
        createlightLogo.src = "http://localhost:8080/Meal/public/images/plus%20%E6%B7%B1.svg";
    }
    var homedarkLogo = document.getElementById('homedarkLogo');
    if (homedarkLogo) {
        homedarkLogo.src = "http://localhost:8080/Meal/public/images/home%20%E6%B7%BA.svg";
    }
};
</script>
@section('content')
<div class="container">
    <h1 class="page-title">創建飯局</h1>

    <form action="{{ route('posts.store') }}" method="POST" class="page-label">
        @csrf
        <label for="name">用餐地點(餐廳): 
            <input type="text" name="restaurant" id="restaurant" required />
        </label><br>

        <label for="time">時間: 
            <input type="text" name="time" id="time" required />
        </label><br>

        <label>備註:
            <textarea name="content"></textarea>
        </label><br>

        <input type="submit" value="submit" />
    </form>
</div>
@endsection