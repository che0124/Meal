@extends('layouts.app')

@section('content')
<div class="container">
    <h1>個人檔案</h1>
    {{$user->name}} <br>
    {{$user->email}}
</div>
@endsection