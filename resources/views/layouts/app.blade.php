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
    <div id="app">
        <div class="navbar">
            <div class="nav-brand">
                <a class="nav-link-brand" href="{{ url('/') }}">
                    <span class="nav-title">{{ config('app.name', 'Laravel') }}</span>
                </a>
            </div>
            <div class="nav-item-list">
                <div class="nav-item">
                    <a class="nav-link" href="{{ url('/') }}">
                        <span class="nav-title">首頁</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="{{ route('posts.create')}}">
                        <span class="nav-title">創建飯局</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="{{ route('surprise') }}">
                        <span class="nav-title">驚喜包</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="{{ route('join') }}">
                        <span class="nav-title">我要假奔</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="#">
                        <span class="nav-title">notify</span>
                    </a>
                </div>
                <div class="nav-item">
                    <a class="nav-link" href="{{ route('{name}', ['name' => $user->name ?? 'None']) }}">
                        <span>個人檔案</span>
                    </a>
                </div>
            </div>
        </div>
        
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>