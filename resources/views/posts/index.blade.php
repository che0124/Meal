@extends('layouts.app')

@section('content')
<div class="container">
    <h1>所有飯局</h1>
    <hr />
    @foreach($posts as $post)
        {{ $post->restaurant }}
        <hr />
    @endforeach
</div>
@endsection