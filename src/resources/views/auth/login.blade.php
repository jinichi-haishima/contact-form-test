@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('contact')
<div class="login-container">
    <h2 class="login-title">Login</h2>
    <div class="login-content">
        <form action="/login" method="post">
            @csrf
            <div class="login-item">
                <p>メールアドレス</p>
                <input type="text" name="email" placeholder="例：test@example.com" value="{{ old('email') }}">
            </div>
            <div class="error-message">
                @error('email')
                {{ $message }}
                @enderror
            </div>
            <div class="login-item">
                <p>パスワード</p>
                <input type="password" name="password" placeholder="例：coachtech1234">
            </div>
            <div class="error-message">
                @error('password')
                {{ $message }}
                @enderror
            </div>
            <div class="login-input">
                <button class="login-button">ログイン</button>
            </div>
        </form>
    </div>
</div>
@endsection