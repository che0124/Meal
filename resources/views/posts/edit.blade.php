@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-title">更新飯局</h1>

        <div class="form">
            <form action="{{ route('posts.update', ['post' => $post]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-item">
                    <label for="name" class="form-field-name">標題:</label>
                    <input type="text" class="form-control" name="restaurant" id="restaurant" value="{{ $post->title }}" required /><br>
                </div>

                <div class="form-item">
                    <label for="name" class="form-field-name">餐廳:</label>
                    <input type="text" class="form-control" name="restaurant" id="restaurant" value="{{ $post->restaurant }}" required /><br>
                </div>

                <div class="form-item">
                    <label for="time" class="form-field-name">時間:</label>
                    <input type="text" class="form-control" name="time" id="time" value="{{ $post->time }}" /><br>
                </div>
                <div class="form-item-textarea">
                    <label class="form-field-name">備註:</label>
                    <textarea name="content" class="form-control-textarea" style="resize: none;">{{ $post->content }}</textarea><br>
                </div>

                <div class="form-item-btn">
                    <input class="btn-primary" type="submit" value="submit" />
                    <form action="{{ route('posts.destroy', ['post' => $post]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                        <input class="btn-primary" type="submit" value="Delete">
                    </form>
                </div>
            </form>
        </div>
    </div>
@endsection
