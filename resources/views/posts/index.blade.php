@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>

<head>

    <style>
        div.ccontainer {
            height: 100%;
            /* margin-left: 220px;  */
            /* padding: 10px 80px 30px 0px;   */
            display: flex;
            flex-wrap: wrap;   
            justify-content:center;  
            align-content: center;
            margin-left: 270px;  
            margin-top: 40px;
            row-gap: 50px; 
        }
        h1 {
            font-size: 30px;
            font-family: 'cwTeXYen', sans-serif;
            text-align: center;
            /* padding: 70px ; */
            margin-top: 90px;
            margin-top: 115px;
            margin-left: 270px;
            /* color:#4B2E20; */
            font-weight:900;
        

        }


        div.p1{
            /* position: absolute; */
            padding: 60px;            
            background-color: #ffdd99;
            box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5);
            border-radius: 20px;
            display: block;
            width: 25%;
            height: 0px;
            margin:10px;
            /* height: auto; */
        }

        a.tit {
            text-decoration: none;
            color: black;
            font-size: 25px;
            font-weight: 600;
            padding: 0px;
            text-align: center;
            display: block;
            margin-left: 0px;
            /* 向左移动 */
            margin-top: -50px;


        }

        a.tit1 {
            text-decoration: none;
            font-size: 23px;
            display: block;
            color: white;
            font-weight: 600;
            text-align: center;
            display: block;
            margin-top: px;
        }

        p2 {
            background-color: #F8981D;
            border-radius: 10px;
            width: 130px;
            height: 40px;
            display: block;
            position: relative;
            left: -30px;
            top: -50px;

        }

        /*  
         
        img.donut {
            position: absolute;
            top: 30px;
            left: 900px;
            margin-top: px;
            height: 200px;
            width: auto;
            transform: rotate(320deg);
            
        }*/

        img.restauraunt {
            position: absolute;
            top: 30px;
            left: 725px;
            margin-top: px;
            height: 80px;
            /* 设置高度 */
            width: auto;
        }
    </style>

</head>
<!--  -->

<body>

    <h1>所有飯局</h1>
    <div class="ccontainer">
        <img class=restauraunt src=http://localhost:8080/Meal/public/images/restaurant.svg alt="標題" />
        <!-- <div class="colorlayer"></div> -->
        @foreach($posts as $post)
        <div class="p1">
            <p2>
                <a class=tit1 href="{{ route('posts.show', ['post'=>$post]) }}">
                    {{$post->time}}
                </a>
            </p2>

            <a class=tit href="{{ route('posts.show', ['post'=>$post]) }}">
                {{ $post->title }}

            </a>
        </div>
        



        @endforeach

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
