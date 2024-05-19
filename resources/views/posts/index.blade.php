@extends('layouts.app')
<script>
window.onload = function() {
    var joinlightLogo = document.getElementById('joinlightLogo');
    if (joinlightLogo) {
        joinlightLogo.src = "http://localhost:8080/Meal/public/images/join%20%E6%B7%B1%E7%89%88.svg";
    }
};
</script>
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