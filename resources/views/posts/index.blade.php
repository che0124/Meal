@extends('layouts.app')
<script>
window.onload = function() {
    var createlightLogo = document.getElementById('createlightLogo');
    if (createlightLogo) {
        createlightLogo.src = "http://localhost:8080/Meal/public/images/create%20%E6%B7%B1.svg";
    }
};
</script>
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