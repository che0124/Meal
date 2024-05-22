@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>飯局資訊</h1>
        <hr />
        {{ $post->restaurant }} <br>
        {{ $post->time }} <br>
        {{ $post->content }}
        
        @if (!$exist)
            <form action="{{ route('post_user.store') }}" method="POST" class="page-label">
                @csrf
                <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                <input type="submit" value="join">
            </form>
        @else
            <p>You have already participated in this post.</p>
        @endif
    </div>
<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            margin-left: 220px;
            /* background: #ffeccf; */
        }

        div.lay {
            background:  #99c2ff;
            /* display: flex; */
            flex-direction: column;
            /* justify-content: center; */
            /* align-items: center; */
            margin-left:-19px; 
            top:30px;
            width: 290px;
            height: 350px;
            padding: 30px 10px;
            border-radius: 8px;
            position: relative;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }

        h1 {
            height: 20%;
            width: 200px;
            margin-top: 0px;
            margin-bottom: 200px;
            /* margin-top:50px; */
            border-radius: 20px;
            background: pink;
            margin-left: auto;
            /* 左侧自动外边距 */
            margin-right: auto;
            font-size: 40px;
            text-align: center;
        }

        div.rest {
            /* padding-top: 20px; */
            /* background-color: green; */
            display: block;
            margin-top: -150px;
            margin-left: 40px;
            margin-right: 30px;
            /* width: 100%; */
            /* margin-bottom: 100px; */
            font-size: 20px;
            /* box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); */
            /* border-radius: 20px; */

            /* width: 25%; */
            /* height: 0px; */
        }

        img.bell {
            position: absolute;
            top: 50px;
            left: 615px;

            /* margin-top: 20px; */
            height: 50px;
            /* 设置高度 */

        }

        img.mouth {
            position: absolute;
            width: 80%;
            /* 设置宽度为父容器的100% */
            height: auto;
            /* 设置高度为父容器的100% */
            object-fit: cover;
            /* bottom: 0; */
            /* height: 300px; */
            top:0px;
            z-index: 0; 
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
        <div class="rest">
        餐廳:{{ $post->restaurant }}<br><br>

        時間:{{ $post->time }} <br><br>
        備註:{{ $post->content }}
        </div>
        
        </div>
        @if (!$exist)
            <form action="{{ route('post_user.store') }}" method="POST" class="page-label">
                @csrf
                <input type="hidden" name="post_id" id="post_id" value="{{ $post->id }}">
                <input type="submit" value="join">
            </form>
        @else
            <p>You have already participated in this post.</p>
        @endif
    </div>
    <img class=mouth src=http://localhost:8080/Meal/public/images/clipart2544596.svg alt="標題" />
</body>

</html>
@endsection