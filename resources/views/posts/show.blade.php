@extends('layouts.app')

@section('content')
<div class="container">
    <h1>飯局資訊</h1>
    <hr />
        {{ $post->restaurant }} <br>
        {{ $post->time }} <br>
        {{ $post->content }}
    <hr />
</div>
@endsection
