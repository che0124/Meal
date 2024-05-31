@extends('layouts.app')

@section('content')
    <div class="container">
        <h1 class="page-title">已參加飯局的用戶</h1>
        @foreach ($profiles as $profile)
            <div class="user">
                <div class="user-avatar">
                    <a href="{{ route('profiles.show', ['profile' => $profile->profile]) }}">
                        <div class="avatar">
                            <img src="{{ asset('storage/' . $profile->profile->avatar->image) }}">
                        </div>
                    </a>
                </div>
                <div>
                    <a class="link" href="{{ route('profiles.show', ['profile' => $profile->profile]) }}">
                        @if ($profile->profile->username)
                            {{ $profile->profile->username }}
                        @else
                            {{ __('使用者尚未輸入使用者名稱') }}
                        @endif
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection
