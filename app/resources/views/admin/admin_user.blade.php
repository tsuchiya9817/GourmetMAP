@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div">
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
      <th>ユーザーID</th>
      <th>ユーザー名</th>
      <th>メールアドレス</th>
      <th>詳細</th>
      <th>ユーザー削除</th>
    </tr>
  </thead>
  <tbody>
    @foreach($users as $user)
    <tr>
      <th>{{ $user->id }}</th>
      <td data-label="所在地">{{ $user->name }}</td>
      <td data-label="社員数">{{ $user->email }}</td>
      <td data-label="社員数"><a href="{{ route('user_page',['id'=>$user['id']]) }}" >ユーザーページへ</a></td>
      <td data-label="社員数"><a id="delete" href="{{ route('admin_user_Delete',['id'=>$user['id']]) }}" >削除</a></td>
    </tr>
    @endforeach
  </tbody>
</table>                       
<br>
<button type="button" onClick="history.back()">戻る</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection