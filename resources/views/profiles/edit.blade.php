@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-title">編輯個人檔案</h1>

        <div class="form">
            <form action="{{ route('profiles.store') }}" method="POST">
                @csrf
                <div class="form-item">
                    <label for="title" class="form-field-name">姓名</label>
                    <input type="text" class="form-control" name="name" id="name" required />
                </div>

                <div class="form-item">
                    <label for="restaurant" class="form-field-name">使用者名稱</label>
                    <input type="text" class="form-control" name="username" id="username" required />
                </div>

                <div class="form-item-textarea">
                    <label class="form-name-textarea">個人簡介</label>
                    <textarea name="bio" class="form-control-textarea" style="resize: none;"></textarea>
                </div>

                <div class="form-item-btn">
                    <input class="btn-primary" type="submit" value="submit" />
                </div>
            </form>
        </div>
    </div>
@endsection
