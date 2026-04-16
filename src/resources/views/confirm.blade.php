@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{asset('css/confirm.css')}}">
@endsection

@section('contact')
<div class="confirm">
    <h2 class="confirm-title">Confirm</h2>
    <form action="/thanks" method="post">
        @csrf
    <table class="confirm-table">
        <tr>
            <th class="confirm-table-th">お名前</th>
            <td class="confirm-table-td">{{ $contacts['last_name'] }} {{$contacts['first_name']}}
                <input type="hidden" name="last_name" value="{{ $contacts['last_name'] }}">
                <input type="hidden" name="first_name" value="{{ $contacts['first_name'] }}">
            </td>
        </tr>
        <tr>
            <th class="confirm-table-th">性別</th>
            <td class="confirm-table-td">{{ $contacts['gender'] ==1? '男性' : ($contacts['gender'] == 2? '女性' : 'その他') }}
                <input type="hidden" name="gender" value="{{ $contacts['gender'] }}">
            </td>
        </tr>
        <tr>
            <th class="confirm-table-th">メールアドレス</th>
            <td class="confirm-table-td">{{ $contacts['email'] }}
                <input type="hidden" name="email" value="{{ $contacts['email'] }}">
            </td>
        </tr>
        <tr>
            <th class="confirm-table-th">電話番号</th>
            <td class="confirm-table-td">{{ $full_tel }}
                <input type="hidden" name="tel" value="{{ $full_tel }}">
            </td>
        </tr>
        <tr>
            <th class="confirm-table-th">住所</th>
            <td class="confirm-table-td">{{ $contacts['address'] }}
                <input type="hidden" name="address" value="{{ $contacts['address'] }}">
            </td>
        </tr>
        <tr>
            <th class="confirm-table-th">建物名</th>
            <td class="confirm-table-td">{{ $contacts['building'] }}
                <input type="hidden" name="building" value="{{ $contacts['building'] }}">
            </td>
        </tr>
        <tr>
            <th class="confirm-table-th">お問い合わせの種類</th>
            <td class="confirm-table-td">{{ $category->content ?? '未選択'}}
                <input type="hidden" name="category_id" value="{{ $contacts['category_id'] }}">
            </td>
        </tr>
        <tr>
            <th class="confirm-table-th">お問い合わせ内容</th>
            <td class="confirm-table-td">
                {{ $contacts['detail'] }}
                <input type="hidden" name="detail" value="{{ $contacts['detail'] }}">
            </td>
        </tr>
    </table>
    <div class="confirm-button">
        <button class="submit-button">送信</button>
    </form>
        <form action="/contact/back" method="post">
            @csrf
            @foreach ($contacts as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <button class="modify-button">修正する</button>
        </form>
    </div>
</div>
@endsection