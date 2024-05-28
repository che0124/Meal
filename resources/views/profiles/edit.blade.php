@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="page-title">編輯個人檔案</h1>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="form">
        <form action="{{ route('profiles.update', ['profile' => $user->id])}}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-item">
                <label for="title" class="form-field-name">姓名</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ old('name', $user->name) }}" required />
            </div>

            <div class="form-item">
                <label for="mbti" class="form-field-name">MBTI</label>
                <select class="form-control" name="MBTI" id="username" required>
                    <option value="INTJ">INFJ</option>
                    <option value="INTP">INFP</option>
                    <option value="ENTJ">INTJ</option>
                    <option value="ENTJ">INTP</option>
                    <option value="ENTJ">ISTJ</option>
                    <option value="ENTJ">ISFJ</option>
                    <option value="ENTJ">ISTP</option>
                    <option value="ENTJ">TSFP</option>
                    <option value="ENTJ">ENTJ</option>
                    <option value="ENTJ">ENTP</option>
                    <option value="ENTJ">ENFJ</option>
                    <option value="ENTJ">ENFP</option>
                    <option value="ENTJ">ESTJ</option>
                    <option value="ENTJ">ESFJ</option>
                    <option value="ENTJ">ESTP</option>
                    <option value="ENTJ">ESFP</option> 
                </select>
            </div>

            <div class="form-item-textarea">
                <label class="form-name-textarea">個人簡介</label>
                <textarea name="bio" class="form-control-textarea" style="resize: none;">{{ old('bio', $user->bio) }}</textarea>
            </div>

            <div class="form-item-btn">

                <input class="btn-primary" type="submit" value="submit" />

            </div>
        </form>
    </div>
</div>
@endsection