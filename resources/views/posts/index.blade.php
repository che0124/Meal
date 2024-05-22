@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-title">所有飯局</h1>
        <hr />
        @foreach ($posts as $post)
            @if (!in_array($post->id, $userPostIds))
                <a class="link" href="{{ route('posts.show', ['post' => $post]) }}">{{ $post->restaurant }}</a>
                <hr />
            @endif
        @endforeach
    </div>
@endsection
