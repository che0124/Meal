@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-title">我的飯局</h1>
        <hr>
        @foreach ($posts as $post)
            @if (in_array($post->id, $userPostIds))
                <a class="link" href="{{ route('posts.show', ['post' => $post]) }}">{{ $post->restaurant }}</a>
                <hr>
            @endif
        @endforeach
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
    </div>
@endsection

@push('scripts')
    <script>
        window.onload = function() {

            var homeSVG = document.getElementById('homeSVG');

            if (homeSVG) {
                homeSVG.innerHTML = `
                <svg aria-label="首頁" class="x1lliihq x1n2onr6 x5n08af" fill="currentColor" height="24" role="img" viewBox="0 0 24 24" width="24">
                    <title>首頁</title>
                    <path d="M22 23h-6.001a1 1 0 0 1-1-1v-5.455a2.997 2.997 0 1 0-5.993 0V22a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V11.543a1.002 1.002 0 0 1 .31-.724l10-9.543a1.001 1.001 0 0 1 1.38 0l10 9.543a1.002 1.002 0 0 1 .31.724V22a1 1 0 0 1-1 1Z"></path>
                    </svg>`;
            }
        };

        var navLinks = document.querySelectorAll('.nav-link');
        navLinks.forEach(function(link) {
            link.addEventListener('click', function() {
                homeSVG.innerHTML = `
                <svg aria-label="首頁" id="homeSVG" fill="currentColor" height="24" role="img"
                    viewBox="0 0 24 24" width="24">
                    <title>首頁</title>
                    <path
                        d="M9.005 16.545a2.997 2.997 0 0 1 2.997-2.997A2.997 2.997 0 0 1 15 16.545V22h7V11.543L12 2 2 11.543V22h7.005Z"
                        fill="none" stroke="currentColor" stroke-linejoin="round" stroke-width="2">
                    </path>
                </svg>`;
            });
        });
    </script>
@endpush
