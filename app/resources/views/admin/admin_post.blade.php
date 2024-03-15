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
      <th>投稿ID</th>
      <th>ユーザーID</th>
      <th>店名</th>
      <th>投稿内容</th>
      <th>ユーザーページ</th>
      <th>投稿削除</th>
    </tr>
  </thead>
  <tbody>
    @foreach($posts as $post)
    <tr>
      <th>{{ $post->id }}</th>
      <td data-label="所在地">{{ $post->user_id }}</td>
      <td data-label="社員数">{{ $post->restrant }}</td>
      <td data-label="社員数" id="message">{{ $post->message }}</td>
      <td data-label="社員数"><a href="{{ route('user_page',['id'=>$post['user_id']]) }}" >ユーザーページへ</a></td>
      <td data-label="社員数"><a id="delete" href="{{ route('admin_post_Delete',['id'=>$post['id']]) }}" >削除</a></td>
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