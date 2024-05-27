@extends('layouts.app')

@section('content')
    <!DOCTYPE html>
    <html>

    <head>
        <style>
            body {
                margin-left: 220px
            }

            .container_s{
                position: relative;
                width: 100%;
                height: 100vh;
                overflow: hidden;
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;

            }

            .background {
                position: absolute;
                background-image: url('https://i.pinimg.com/originals/95/db/dd/95dbdd16dcf11d3fd60c4e19b963b8c0.jpg');
                background-size: cover;
                background-position: center;
                opacity: 0.3;
                width: 100%;
                height: 100vh;
                z-index: 1;
            }


            .lay {
                background: #fef8f2;
                border: 1px solid #dddddd00;
                position: relative;
                flex-direction: column;
                width: 40%;
                height: 40%;
                padding: 30px 10px;
                border-radius: 10px;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
                z-index: 1;
                align-items: center;
                text-align: center;

            }

            h1 {
                height: 20%;
                width: 90%;
                border-radius: 20px;
                background:  #A67B5B;
                margin: auto;
                letter-spacing: 2px;
                color: #fff;
                font-size: 30px;
                text-align: center;
                line-height: 2.2;
            }

            .rest {
                /* padding: 50px; */
                /* background-color: #330c0c; */
                /* height: 70%; */
                /* width: 280px; */
                /* display: block; */
                /* margin-top: -175px;
                margin-left: 50px;
                margin-right: 30px; */
                /* border-radius: 10px; */
                font-size: 23px;
                font-weight: 500;
                letter-spacing: 2px;
                margin: auto;
                margin-top: 50px;
                color: #4B2E20;
            }

            input {
                /* z-index: 1000; */
                display: block;
                /* margin: 10px 0; */
                width: 95%;
                line-height: 40px;
                border-radius: 25px;
                background-color: #A67B5B;
                box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
                border: none;
                font-size: 18px;
                font-weight: 700;
                color: white;
                letter-spacing: 1px;
                /* text-align: center; */
                /* margin-left: auto; */
                /* margin: auto; */

            }

            input:hover {
                background-color: #7A5230;
                cursor: pointer;
            }

            input:active {
                box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);
                transform: translate(2px 4px);
            }

            div.button {
                position: relative;
                /* top: 370px; */
                /* left: 745px; */
                /* transform: translateX(-50%); */
                z-index: 1;
                padding: 10px;
                border-radius: 8px;
                /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); */
                width: 200px;
                margin: auto;
                /* text-align: center; */
                /* align-items: center; */
            }

            .eat {
                /* position: relative; */
                /* display: flex; */
                /* align-items: center; */
                /* top: 50%;
                left: 25%; */
                /* transform: translateX(-50%); */
                z-index: 1;
                /* font-weight: 100px; */

                height: 5%;
                width: 40%;
                border-radius: 15px;
                background-color: #7A5230;
                margin-top: 20px;
                color: #fff;
                font-size: 20px;
                text-align: center;
            }

            p {
                color: #fff;
                margin-top: 2.3px;
                font-weight: 300

            }
        </style>
    </head>

    <body>
        <div class="container_s">
            <div class="background"></div>
            <div class="lay">
                <h1>{{ $post->title }}</h1>
                <p class="rest">
                    餐廳: {{ $post->restaurant }}<br><br>
                    時間: {{ $post->time }} <br><br>
                    備註: {{ $post->content }}
                </p>
            </div>

            @if (!$exist)
                <form action="{{ route('post_user.store') }}" method="POST" class="page-label">
                    @csrf
                    <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                    <div class=button>
                        <input type="submit" value="join">
                    </div>
                </form>
            @else
                <div class="eat">
                    <p>已參加此飯局!</p>
                </div>
            @endif
        </div>
    </body>

    </html>
@endsection
