@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('contact')
<div class="contacts">
    <h2 class="contacts-title">Contact</h2>
    <form action="/confirm" method="post">
        @csrf
        <table class="contacts-table">
            <tr>
                <th>お名前<span class="contacts-table-span">※</span></th>
                <td class="contacts-item">
                    <input type="text" name="last_name" placeholder="例：山田" value="{{ old('last_name') }}">
                    <input type="text" name="first_name"placeholder="例：太郎" value="{{ old('first_name') }}">
                </td>
            </tr>
            @if ($errors->has('fullname')||$errors->has('last_name')||$errors->has('first_name'))
            <tr>
                <th></th>
                <td colspan="2" class="error-message">
                    @error('fullname')
                    {{ $message }}
                    @enderror
                    @error('last_name')
                    {{ $message }}
                    @enderror
                    @error('first_name')
                    {{ $message }}
                    @enderror
                </td>
            </tr>
            @endif
            <tr>
                <th>性別<span class="contacts-table-span">※</span></th>
                <td>
                    <label>
                        <input type="radio" name="gender" value="1" checked> 男性
                    </label>
                    <label>
                        <input type="radio" name="gender" value="2"> 女性
                    </label>
                    <label>
                        <input type="radio" name="gender" value="3"> その他
                    </label>
                </td>
            </tr>
            @error('gender')
            <tr>
                <th></th>
                <td class="error-message">
                    @error('gender')
                    {{ $message }}
                    @enderror
                </td>
            </tr>
            @enderror
            <tr>
                <th>メールアドレス<span class="contacts-table-span">※</span></th>
                <td class="contacts-item">
                    <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}">
                </td>
            </tr>
            @error('email')
            <tr>
                <th></th>
                <td class="error-message">
                    @error('email')
                    {{ $message }}
                    @enderror
                </td>
            </tr>
            @enderror
            <tr>
                <th>電話番号<span class="contacts-table-span">※</span></th>
                <td class="contacts-item">
                    <input type="text" name="tel1" placeholder="080" value="{{ old('tel1') }}">
                    <span>-</span>
                    <input type="text" name="tel2" placeholder="1234" value="{{ old('tel2') }}">
                    <span>-</span>
                    <input type="text" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
                </td>
            </tr>
            @if ($errors->has('tel1')||$errors->has('tel2')||$errors->has('tel3'))
            <tr>
                <th></th>
                <td colspan="2" class="error-message">
                    @error('tel1')
                    {{ $message }}
                    @enderror
                    @error('tel2')
                    {{ $message }}
                    @enderror
                    @error('tel3')
                    {{ $message }}
                    @enderror
                </td>
            </tr>
            @endif
            <tr>
                <th>住所<span class="contacts-table-span">※</span></th>
                <td class="contacts-item">
                    <input type="text" name="address" placeholder="例：東京都渋谷区千駄ヶ谷１−２−３" value="{{ old('address') }}">
                </td>
            </tr>
            @error('address')
            <tr>
                <th></th>
                <td class="error-message">
                    @error('address')
                    {{ $message }}
                    @enderror
                </td>
            </tr>
            @enderror
            <tr>
                <th>建物名</th>
                <td class="contacts-item">
                    <input type="text" name="building" placeholder="例：千駄ヶ谷マンション101" value="{{ old('building') }}">
                </td>
            </tr>
            <tr>
                <th>お問い合わせの種類<span class="contacts-table-span">※</span></th>
                <td class="contacts-item">
                    <select name="category_id">
                        @foreach ($categories as $category)
                        <option value="{{ ($category->id) }}">{{ ($category->content) }}</option>
                        @endforeach
                    </select>
                </td>
            </tr>
            @error('category_id')
            <tr>
                <th></th>
                <td class="error-message">
                    @error('category_id')
                    {{ $message }}
                    @enderror
                </td>
            </tr>
            @enderror
            <tr>
                <th>お問い合わせ内容<span class="contacts-table-span">※</span></th>
                <td class="contacts-item">
                    <textarea name="detail" id="" placeholder="お問い合わせ内容をご記載ください" value="{{ old('detail') }}"></textarea>
                </td>
            </tr>
            <tr>
            @error('detail')
                <th></th>
                <td class="error-message">
                    @error('detail')
                    {{ $message }}
                    @enderror
                </td>
            </tr>
            @enderror
         </table>
         <div class="contacts-button">
            <button type="submit">確認画面</button>
        </div>
    </form>
</div>
@endsection