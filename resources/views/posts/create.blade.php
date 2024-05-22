@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="page-title">創建飯局</h1>

    <form action="{{ route('posts.store') }}" method="POST" class="page-label">
        @csrf
        <label for="title">派對名稱: 
            <input type="text" name="title" id="title" required />
        </label><br>

        <label for="name">用餐地點(餐廳): 
            <input type="text" name="restaurant" id="restaurant" required />
        </label><br>

        <label for="time">時間: 
            <input type="text" name="time" id="time" required />
        </label><br>

        <label>備註:
            <textarea name="content"></textarea>
        </label><br>

        <input type="submit" value="submit" />
    </form>
</div>
@endsection