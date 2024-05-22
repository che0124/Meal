@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html>

<head>

    <style>
        .ccontainer {
            height: 100%;
            margin-left: 220px; 
            /* padding: 10px 80px 30px 0px;   */
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center; 
            align-content: flex-start;
            row-gap: 50px;
            column-gap:40px;

        }

        h1 {
            font-size: 30px;
            font-family: 'cwTeXYen', sans-serif;
            text-align: center;
            /* padding: 70px ; */
            margin-top: 90px;
            margin-left: 270px;


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
            top: 10px;
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
        <div class="circle"></div>
        <img class=restauraunt src=http://localhost:8080/Meal/public/images/restaurant.svg alt="標題" />
        <!-- <img class=donut src=http://localhost:8080/Meal/public/images/donut.svg alt="標題" />  -->
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
