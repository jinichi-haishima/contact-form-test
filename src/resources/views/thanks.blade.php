@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/thanks.css') }}">
@endsection

@section('no_header')
@endsection

@section('contact')
<div class="thanks">
    <p>お問い合わせありがとうございました</p>
    <button>
        <a href="">home</a>
    </button>
</div>
@endsection