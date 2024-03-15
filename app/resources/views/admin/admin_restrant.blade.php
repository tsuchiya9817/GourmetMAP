@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div>
        <div>
  <form action="" method="GET" class="search-form">
  <label>
    <input type="text" name="keyword" value="{{ $keyword }}" placeholder="キーワードを入力">
    </label>
    <button type="submit" aria-label="検索"></button>
  </form>
</div>
<br>
                    <table class="table_design08">
                    <thead>
    <tr>
      <th>店舗ID</th>
      <th>店名</th>
      <th>住所</th>
      <th>緯度</th>
      <th>経度</th>
      <th>編集</th>
      <th>削除</th>
    </tr>
  </thead>
  <tbody>
    @foreach($restrants as $restrant)
    <tr>
      <th>{{ $restrant->id }}</th>
      <td data-label="所在地">{{ $restrant->restrant }}</td>
      <td data-label="社員数">{{ $restrant->adress }}</td>
      <td data-label="社員数">{{ $restrant->lat }}</td>
      <td data-label="社員数">{{ $restrant->lng }}</td>
      <td data-label="社員数"><a href="{{ route('admin_restrant_edit',['id'=>$restrant['id']]) }}" >編集</a></td>
      <td data-label="社員数"><a id="delete" href="{{ route('admin_restrant_Delete',['id'=>$restrant['id']]) }}" >削除</a></td>
    </tr>
    @endforeach
  </tbody>
</table>
<div class="card-body">
                        <center>
                            <a class="btn btn-link" href="{{ route('admin_restrant_regist') }}">
                                {{ __('レストラン登録') }}
                            </a>
                        </center>
                        <button type="button" onClick="history.back()">戻る</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection