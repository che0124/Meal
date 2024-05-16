@extends('layouts.app')
<script>
window.onload = function() {
    var baglightLogo = document.getElementById('baglightLogo');
    if (baglightLogo) {
        baglightLogo.src = "http://localhost:8080/Meal/public/images/bag%20%E6%B7%B1.svg";
    }
};
</script>
@section('content')
<div class="container">
    <h1 class="page-title">驚喜包</h1>
    <hr />
    @foreach($posts as $post)
        {{ $post->restaurant }}
        <hr />
    @endforeach
</div>
@endsection