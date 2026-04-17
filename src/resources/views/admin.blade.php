@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('contact')
<!-- モーダル表示 -->
@foreach ($contacts as $contact)
<div class="modal fade" id="detailModal{{ $contact->id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-borderless mb-0">
                    <tr class="modal-tr">
                        <th class="modal-th" style="width: 30%;">名前</th>
                        <td class="modal-td">{{ $contact->last_name }} {{ $contact->first_name }}</td>
                    </tr>
                    <tr class="modal-tr">
                        <th class="modal-th" style="width: 30%;">性別</th>
                        <td class="modal-td">@if($contact->gender=="1")男性@elseif($contact->gender=="2")女性@elseその他@endif
                        </td>
                    </tr>
                    <tr class="modal-tr">
                        <th class="modal-th" style="width: 30%;">メールアドレス</th>
                        <td class="modal-td">{{ $contact->email }}</td>
                    </tr>
                    <tr class="modal-tr">
                        <th class="modal-th" style="width: 30%;">電話番号</th>
                        <td class="modal-td">{{ $contact->tel }}</td>
                    </tr>
                    <tr class="modal-tr">
                        <th class="modal-th" style="width: 30%;">住所</th>
                        <td class="modal-td">{{ $contact->address }}</td>
                    </tr>
                    <tr class="modal-tr">
                        <th class="modal-th" style="width: 30%;">建物名</th>
                        <td class="modal-td">{{ $contact->building_name }}</td>
                    </tr>
                    <tr class="modal-tr">
                        <th class="modal-th" style="width: 30%;">お問い合わせの種類</th>
                        <td class="modal-td">{{ $contact->category->content }}</td>
                    </tr>
                    <tr class="modal-tr">
                        <th class="modal-th" style="width: 30%;">お問い合わせ内容</th>
                        <td class="modal-td">{{ $contact->contact }}</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <form action="{{route('admin.destroy',$contact->id)}}" method="POST"
                    onsubmit="return confirm('本当に削除しますか？');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">削除</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif
<!-- 検索 -->
<div class="admin-container">
    <h2 class="admin-title">Admin</h2>
    <section class="search-section">
        <form action="/search" method="get" class="search-form">
            @csrf
            <div class="search-item">
                <input type="text" name="keyword" class="form-control" placeholder="名前やメールアドレスを入力"
                    value="{{ request('keyword') }}">
            </div>
            <div class="search-item">
                <select name="gender" class="form-select">
                    <option value=>性別</option>
                    <option value="1" {{ request('gender')=='1' ? 'selected' : '' }}>男性</option>
                    <option value="2" {{ request('gender')=='2' ? 'selected' : '' }}>女性</option>
                    <option value="3" {{ request('gender')=='3' ? 'selected' : '' }}>その他</option>
                </select>
            </div>

            <div class="search-item">
                <select class="form-select" name="category_id">
                    <option value="">お問い合わせの種類</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}" {{ request('category_id')==$category->id ? 'selected' : '' }}>{{
                        $category->content }}</option>
                    @endforeach
                </select>
            </div>
            <div class="search-item">
                <input type="date" name="date" class="form-control" value="{{ request('date') }}">
            </div>
            <div class="search-item">
                <button type="submit" class="submit-button">検索</button>
                <a href="/reset" class="reset-button">リセット</a>
            </div>
        </form>
    </section>
    <div class="export-page">
        <div>
            <button class="export-button">
                <a href="{{ url('/export') }}?{{ http_build_query(request()->query()) }}">CSVエクスポート</a>
            </button>
        </div>
        <div class="pagination-wrapper">
            {{ $contacts->links() }}
        </div>
    </div>
    <div class="search-result">
        <table class="search-result-table">
            <tr class="search-result-tr">
                <th class="search-result-th">お名前</th>
                <th class="search-result-th">性別</th>
                <th class="search-result-th">メールアドレス</th>
                <th class="search-result-th">お問い合わせの種類</th>
                <th class="search-result-th"></th>
            </tr>
            @foreach ($contacts as $contact)
            <tr class="search-result-answer-tr">
                <td class="search-result-td">{{ $contact->last_name .' '. $contact->first_name }}</td>
                <td class="search-result-td">@if($contact->gender==1)男性@elseif($contact->gender==2)女性@elseその他@endif</td>
                <td class="search-result-td">{{ $contact->email }}</td>
                <td class="search-result-td">{{ $contact->category->content }}</td>
                <td class="search-result-td">
                    <button type="button" class="detail-button" data-bs-toggle="modal"
                        data-bs-target="#detailModal{{ $contact->id }}">詳細</button>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection