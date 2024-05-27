<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    @vite(['resources/css/app.css'])

</head>

<body>
    <div class="heroSection">
        <div class="section-container">
            <header class="header">
                <div class="header-item"> <a class="nav-link-brand" href="{{ url('#') }}">
                        <img src="http://localhost:8080/Meal/public/images/logo.svg" alt="logo" height="40px"
                            width="100px" style="float: right" />
                    </a></div>
                <div class="header-item">
                    <h1 class="home-title">覓得你的專屬飯友</h1>
                </div>
                <div class="user-actions">
                    <a href="{{ route('login') }}" class="header-login"><span>Log in</span></a>
                    <a href="{{ route('register') }}" class="header-signup"><span>Sign up</span></a>
                    <div class="placeholder"></div>
                </div>
            </header>

            <div class="rectangle1">
                <div class="rectangle-container">
                    <div class="rect-item">
                        <img src="{{ asset('images\friend.jpg') }}" class="section-img" />
                    </div>
                    <div class="rect-item content">
                        <div class="small-title" style="width: 900px; height: 75.06px; left: 500px; top: 35px;">
                            <h3 class="section-title">帶你離開一成不變的生活！</h2>
                        </div>
                        <div class="home-context" style="width: 565px; height: 141px; left: 500px; top: 120px">
                            你是否發現交友圈逐漸固定，生活變得枯燥乏味？<br>
                            是時候加入我們，改變現狀了！<br>
                            無論你是想認識新朋友，還是尋找口味相同的夥伴，<br>
                            『Meal 覓友』都能幫助你打破生活的沉悶，探索全新旅程。
                        </div>
                    </div>
                    <div class="rect-item">
                        <button onclick="location.href='{{ route('register') }}'" class="home-btn"
                            style="left: 1025px; top: 100px">
                            創<br>建<br>帳<br>號
                        </button>
                    </div>
                </div>
            </div>

            <div class="rectangle2">
                <div class="rectangle-container">
                    <div class="rect-item">
                        <button onclick="location.href='{{ route('register') }}'" class="home-btn"
                            style="left: 70px; top: 100px">
                            開<br>始<br>體<br>驗
                        </button>
                    </div>

                    <div class="rect-item content">
                        <div class="small-title" style="width: 900px; height: 75.06px; left: 500px; top: 35px;">
                            <h3 class="section-title">隨時都能感受驚喜的魅力！</h3>
                        </div>
                        <div class="home-context" style="width: 565px; height: 141px; left: 180px; top: 120px">
                            你是否厭倦了制式化的交友方式？<br>
                            加入『Meal 覓友』，即可享受如開驚喜包般的浪漫體驗。<br>
                            每次見面都是未知的探索，為你的生活增添無限趣味，<br>
                            一起沉浸在這個充滿驚喜和浪漫的交友新世界吧！
                        </div>
                    </div>

                    <div class="rect-item">
                        <img src="{{ asset('images\new.jpg') }}" class="section-img" />
                    </div>
                </div>
            </div>

            <div class="rectangle3">
                <div class="rectangle-container">
                    <div class="rect-item">
                        <img src="{{ asset('images\phone.jpg') }}" class="section-img" />
                    </div>
                    <div class="rect-item content">
                        <div class="small-title" style="width: 900px; height: 75.06px; left: 500px; top: 35px;">
                            <span class="section-title">毋須學習，簡單上手！</span>
                        </div>
                        <div class="home-context" style="width: 565px; height: 141px; left: 500px; top: 120px">
                            你是否疲於適應複雜繁瑣的交友過程？<br>
                            在這個快節奏的時代，認識新夥伴應該是輕鬆愉快的，<br>
                            『Meal 覓友』為你提供最直觀的操作介面，<br>
                            省去複雜的過程，只需幾步操作，快速開啟你的交友之旅！
                        </div>
                    </div>
                    <div class="rect-item">
                        <button onclick="location.href='{{ route('register') }}'" class="home-btn"
                            style="left: 1025px; top: 100px">
                            立<br>即<br>加<br>入
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>