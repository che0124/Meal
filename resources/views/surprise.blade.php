@extends('layouts.app')

@section('content')
<div class="container">
    <h1>驚喜包</h1>
    <hr />
    @foreach($posts as $post)
        {{ $post->restaurant }}
        <hr />
    @endforeach
</div>
@endsection