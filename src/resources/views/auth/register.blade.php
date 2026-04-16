@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection



@section('contact')
@if (session('success'))
<div class="success-message">
    {{ session('success') }}
</div>
@endif
<div class="register-container">
    <h2 class="register-title">Register</h2>
    <div class="register-content">
        <form action="/register" method="post">
            @csrf
        <div class="register-item">
            <p>お名前</p>
            <input type="text" name="name" placeholder="例：山田 太郎">
        </div>
            <div class="error-message">
                    @error('name')
                    {{ $message }}
                    @enderror
            </div>
        <div class="register-item">
            <p>メールアドレス</p>
            <input type="text" name="email" id="" placeholder="例：test@exaple.com">
        </div>
        <div class="error-message">
                @error('email')
                {{ $message }}
                @enderror
        </div>
        <div class="register-item">
            <p>パスワード</p>
            <input type="text" name="password" id="" placeholder="例：coachtech1234">
        </div>
        <div class="error-message">
                @error('password')
                {{ $message }}
                @enderror
        </div>
        <div class="register-input">
            <button class="register-button">登録</button>
        </div>
        </form>
    </div>
</div>
@endsection
