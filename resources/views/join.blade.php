@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<div class="container">
    <h1 class="page-title">我要假奔</h1>
    
    
    @foreach($posts as $post)
        <a href="{{route('posts.show', ['post'=>$post])}}">第{{ $post->id }}組 餐廳=>{{ $post->restaurant }}</a>
        <br>
        <br>
        
    @endforeach
</div>
<style>

</style>
@endsection
