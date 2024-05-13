@extends('layouts.app')

@section('content')
<div class="container">
    更新飯局
    <form action="{{ route('posts.update', ['post' => $post]) }}" method="POST">
        @method('PUT')
        @csrf
        <label for="name">Enter restaurant: 
            <input type="text" name="restaurant" id="restaurant" value="{{ $post->restaurant }}" required />
        </label><br>

        <label for="time">Enter the meal time: 
            <input type="text" name="time" id="time" value="{{ $post->time }}" />
        </label><br>

        <label>content:
            <textarea name="content">{{ $post->content }}</textarea>
        </label><br>

        <input type="submit" value="submit" />
        <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST">
            @method('DELETE')
            @csrf
            <input type="submit" value="Delete">
        </form>
    </form>
</div>
@endsection