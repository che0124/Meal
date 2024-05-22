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
@endsection
