@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('no_header')
@endsection

@section('contact')
<div class="thanks-container">
    <div class="thanks-background">Thank you</div>

    <div class="thanks-content">
        <p class="thanks-message">お問い合わせありがとうございました</p>
        <a href="/" class="thanks-button">HOME</a>
    </div>

</div>
@endsection