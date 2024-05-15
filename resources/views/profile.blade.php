@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="page-title">個人檔案</h1>
    {{$user->name}} <br>
    {{$user->email}}
</div>
@endsection