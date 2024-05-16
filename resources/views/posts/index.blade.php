@extends('layouts.app')

@section('content')
<div class="container">
    <h1>所有飯局</h1>
    <hr />
    @foreach($posts as $post)
        <a href="{{ route('posts.show', ['post'=>$post]) }}">{{ $post->restaurant }}</a>
        <hr/>
    @endforeach
</div>
@endsection