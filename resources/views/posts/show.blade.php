@extends('layouts.app')

@section('content')

<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            margin-left: 220px;
            /* background: #ffeccf; */
        }

        div.lay {
            background: #ffd699;
            /* display: flex; */
            flex-direction: column;
            /* justify-content: center; */
            /* align-items: center; */
            top: 30px;
            width: 290px;
            height: 350px;
            padding: 30px 10px;
            border-radius: 8px;
            position: relative;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.9);  */
            z-index: 1;
            left:75px;
        }

        h1 {
            height: 20%;
            width: 220px;
            margin-top: 0px;
            margin-bottom: 200px;
            border-radius: 20px;
            background:#cc6600;
            margin-left: auto;
            letter-spacing: 0.5px;
            margin-right: auto;
            color:black;
            font-size: 30px;
            text-align: center;
            line-height: 2.2;
        }

        p.rest {
            /* padding-top: 20px; */
            /* background-color: green; */
            display: block;
            margin-top: -175px;
            margin-left: 50px;
            margin-right: 30px;
            font-size: 20px;
            font-weight:500;
            letter-spacing: 0.5px;
            /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);   */
            /* box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); */
            border-radius: 10px; 

            /* width: 25%; */
            /* height: 0px; */
        }

        img.mouth {
            position: absolute;
            width: 83%;
            /* 设置宽度为父容器的100% */
            height: auto;
            /* 设置高度为父容器的100% */
            object-fit: cover;
            /* bottom: 0; */
            /* height: 300px; */
            top: 0px;
            z-index: 0;
        }


         input { 
            z-index: 1000;
            display: block;
            /* margin: 10px 0; */
            width: 95%;
            line-height: 40px;
            border-radius: 27px;
            background-color: #cc6600;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            border: none;
            font-size: medium;
            font-weight: 700;
            color:white;
            letter-spacing: 1px;
            /* text-align: center; */
            margin-left:auto;
        }
        input:hover{
            background-color:#cc6600;
            cursor:pointer;
        }
        input:active{
            box-shadow: 0 2px 2px rgba(0, 0, 0, 0.2);
            transform:translate(2px 4px);
        }
        div.buttom {
            position: absolute; 
            top: 370px;
            left: 745px; 
            transform: translateX(-50%);
            z-index: 1001;
            padding: 10px;
            border-radius: 8px;
            /* box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2); */
            width: 10%; 
        }
        div.eat{
            position: absolute; 
            top: 380px;
            left: 750px; 
            transform: translateX(-50%);
            z-index: 1001;
            font-weight:100px;
            font-size:medium;
            width: 15%; 
            background-color: rgba(204, 102, 0, 0.8);
            border-radius:30px;

        }
        
        p{
            margin-left:20px;
            color:black;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- <img class=eat src=http://localhost:8080/Meal/public/images/cutlery.svg alt="標題" /> -->
        <!-- <img class=eat1 src=http://localhost:8080/Meal/public/images/cutlery.svg alt="標題" /> -->
        <!-- <img class=bell src=http://localhost:8080/Meal/public/images/bell.svg alt="標題" /> -->

        <div class="lay">
            <h1>{{ $post->title }}</h1>
            <p class="rest">
                餐廳:{{ $post->restaurant }}<br><br>

                時間:{{ $post->time }} <br><br>
                備註:{{ $post->content }}
            </p>
        </div>


        @if (!$exist)

        <form action="{{ route('post_user.store') }}" method="POST" class="page-label">
            @csrf
            <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
            <div class=buttom>
                <input type="submit" value="join">
            </div>
        </form>
        @else
        <div class="eat">
        <p>你已經參加此飯局了!</p>
        </div>
        @endif

    </div>
    <img class=mouth src=http://localhost:8080/Meal/public/images/clipart2544596.svg alt="標題" />
</body>

</html>
@endsection


