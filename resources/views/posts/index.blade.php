@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html>

    <head>

        <style>
            .title {
                display: flex;
                align-items: center;
                justify-content: start;
                height: 50px;
                width: 100%;
                margin: 20px 0
            }

            .title-item {
                display: flex;
                align-items: center;
                height: 100%;
            }

            .title-item img {
                height: 100%;
                width: auto;
            }

            .page-title {
                margin-left: 20px;
            }


            .all-posts {
                display: flex;
                flex-wrap: wrap;
                align-items: center;
                padding-right: 100px;
            }

            .post-container {
                background-color: #be9a7883;
                border-radius: 10px;
                height: 100%;
                width: 100%;
            }

            .post-link {
                display: block;
                width: 30%;
                height: 200px;
                text-decoration: none;
                font-size: 23px;
                font-weight: 600;
                margin: 10px 10px;
            }

            .post-link:hover {
                transform: scale(1.05);
                transition: transform 0.3s ease;
            }


            .post-container .post {
                display: flex;
                flex-direction: column;
                padding: 30px;
            }

            .post .post-title {
                display: flex;
                justify-content: start;
                text-decoration: none;
                color: black;
                font-size: 25px;
                font-weight: 400;
                text-align: center;
                padding-top:;
            }
        </style>
    </head>


    <body>

        <div class="container">
            <div class="join-container">
                <div class="title">
                    <div class="title-item">
                        <img src=http://localhost:8080/Meal/public/images/restaurant.svg />
                    </div>
                    <div class="title-item">
                        <h1 class="page-title">我要假奔</h1>
                    </div>
                </div>
                <div class="all-posts">
                    @foreach ($posts as $post)
                        @if (!in_array($post->id, $userPostIds))
                            <a class="post-link" href="{{ route('posts.show', ['post' => $post]) }}">
                                <div class="post-container">
                                    <div class="post">
                                        <div class="post-title">
                                            {{ $post->title }}
                                        </div>
                                        <div class="post-title">
                                            {{ $post->restaurant }}
                                        </div>
                                        <div class="post-title">
                                            {{ $post->date }}
                                        </div>
                                        <div class="post-title">
                                            {{ $post->time }}
                                        </div>
                                    </div>
                                </div>
                            </a>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>




    </body>

    </html>
@endsection

@push('scripts')
    <script>
        window.onload = function() {
            var joinSVG = document.getElementById('joinSVG');
            if (joinSVG) {
                // Clear existing content
                joinSVG.innerHTML = '';

                // Add new SVG content
                joinSVG.innerHTML = `
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M11.45 20.9C16.6691 20.9 20.9 16.6691 20.9 11.45C20.9 6.23091 16.6691 2 11.45 2C6.23091 2 2 6.23091 2 11.45C2 16.6691 6.23091 20.9 11.45 20.9ZM11.45 5.05004C10.6095 5.05004 9.77731 5.21558 9.00083 5.53721C8.22435 5.85884 7.51882 6.33026 6.92452 6.92455C6.33023 7.51885 5.85881 8.22438 5.53718 9.00086C5.21555 9.77735 5.05 10.6096 5.05 11.45C5.05 12.0023 5.49772 12.45 6.05 12.45C6.60229 12.45 7.05 12.0023 7.05 11.45C7.05 10.8722 7.16381 10.3001 7.38493 9.76623C7.60606 9.2324 7.93016 8.74734 8.33873 8.33877C8.74731 7.93019 9.23236 7.60609 9.7662 7.38497C10.3 7.16385 10.8722 7.05004 11.45 7.05004C12.0023 7.05004 12.45 6.60232 12.45 6.05004C12.45 5.49775 12.0023 5.05004 11.45 5.05004Z"
                        fill="currentColor" />
                    <path d="M23 23L20 20" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" />
                </svg>`;

                var navLinks = document.querySelectorAll('.nav-link');
                navLinks.forEach(function(link) {
                    link.addEventListener('click', function() {
                        joinSVG.innerHTML = `
                        <svg id="joinSVG" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <circle cx="11.5" cy="10.5" r="8.5" stroke="currentColor"
                                stroke-width="2" />
                            <path
                                d="M11 6C10.4747 6 9.95457 6.10346 9.46927 6.30448C8.98396 6.5055 8.54301 6.80014 8.17157 7.17157C7.80014 7.54301 7.5055 7.98396 7.30448 8.46927C7.10346 8.95457 7 9.47471 7 10"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" />
                            <path d="M23 22L18 17" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" />
                        </svg>`;
                    });
                });
            }
        };
    </script>
@endpush
