@extends('layouts.app')

@section('content')
<div class="container">
    <h1>創建飯局</h1>

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <label for="name">Enter restaurant: 
            <input type="text" name="restaurant" id="restaurant" required />
        </label><br>

        <label for="time">Enter the meal time: 
            <input type="text" name="time" id="time" required />
        </label><br>

        <label>content:
            <textarea name="content"></textarea>
        </label><br>

        <input type="submit" value="submit" />
    </form>
</div>
@endsection