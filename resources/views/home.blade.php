@extends('layouts.app')
<script>
    window.onload = function () {
        var homelightLogo = document.getElementById('homelightLogo');
        if (homelightLogo) {
            homelightLogo.src = "http://localhost:8080/Meal/public/images/home%20%E6%B7%B1%E7%89%88.svg";
        }
    };
</script>
<link rel="stylesheet" href="{{ asset('css/home.css') }}">
@section('content')
<div class="home-container">
    <h1 class="home-title">{{ ('覓得你的專屬飯友') }}</h1>

    <div class="rectangle1">
        <div class="small-title" style="width: 504.4px; height: 75.06px; left: 500px; top: 35px;">
            好餓喔， 揪人一起吃！
        </div>
        <img src="{{ asset('images\home-create.jpg') }}" alt="使用者淺logo"
            style="position: absolute; width: 400px; height: 226px; left: 50px; top: 35px; box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.25);border-radius: 45px;" />
        <div class="home-context" style="width: 565px; height: 141px; left: 500px; top: 120px">
            交友圈逐漸固定，生活變得枯燥乏味？<br>
            創建專屬飯局，一起改變現狀吧！<br>
            無論是想認識新朋友，還是尋找口味相同的夥伴，<br>
            交給『Meal 覓友』，幫你打破生活的沉悶。<br>
        </div>
        <button onclick="location.href='{{ route('posts.create') }}'" class="home-btn" style="left: 1025px; top: 100px">
            創<br>建<br>飯<br>局
        </button>
    </div>
    <div class="rectangle2">
        <div class="small-title" style="width: 504.4px; height: 75.06px; left: 180px; top: 35px;">
            好無聊，來點驚喜吧！
        </div>
        <img src="{{ asset('images\home-surprise.jpg') }}" alt="使用者淺logo"
            style="position: absolute; width: 400px; height: 226px; left: 710px; top: 35px; box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.25);border-radius: 45px;" />
        <div class="home-context" style="width: 565px; height: 141px; left: 180px; top: 120px">
            厭倦了制式化的交友方式嗎？<br>
            『Meal 覓友』提供全新的驚喜包體驗，<br>
            每次見面都是未知的探索，為生活增添無限趣味，<br>
            現在就開始享受全新的交友世界吧！
        </div>
        <button onclick="location.href='{{ route('surprise') }}'" class="home-btn" style="left: 70px; top: 100px">
            驚<br>喜<br>包
        </button>
    </div>
    <div class="rectangle3">
        <div class="small-title" style="width: 504.4px; height: 75.06px; left: 500px; top: 35px;">
            隨便啦，我就想吃飯！
        </div>
        <img src="{{ asset('images\home-join.jpg') }}" alt="使用者淺logo"
            style="position: absolute; width: 400px; height: 226px; left: 50px; top: 35px; box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.25);border-radius: 45px;" />
        <div class="home-context" style="width: 565px; height: 141px; left: 500px; top: 120px">
            時間彈性，不挑餐廳，還是找不到飯友？<br>
            現在就加入已有的飯局吧！<br>
            『Meal 覓友』帶你走入他人的世界，<br>
            無論何人何時何地，都可以開啟一場交友盛宴！
        </div>
        <button onclick="location.href='{{ route('posts.index') }}'" class="home-btn" style="left: 1025px; top: 100px">
            加<br>入<br>飯<br>局
        </button>
    </div>
</div>
@endsection