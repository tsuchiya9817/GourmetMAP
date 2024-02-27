@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header">ユーザー情報編集</div>
          <div class="card-body">
            @if($errors->any())
              <div class="alert alert-danger">
                @foreach($errors->all() as $message)
                  <p>{{ $message }}</p>
                @endforeach
              </div>
            @endif
            <form action="" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="name">ユーザー名</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $users['name'] }}" />
              </div>
              <div class="form-group">
                <label for="email">メールアドレス</label>
                <input type="text" class="form-control" id="email" name="email" value="{{ $users['email'] }}" />
              </div>
              <div class="form-group">
                <label for="user_icon">アイコン画像</label>
                <input type="file" class="form-control" id="user_icon" name='user_icon' value="{{ $users['path'] }}">
              </div>
              <div class="form-group">
                <label for="profile">プロフィール</label>
                <textarea class='form-control' name='profile' id="profile">{{ $users['profile'] }}</textarea>
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">登録</button>
              </div>
            </form>
          </div>
        </nav>
        <div class="text-center">
          <a href="">アカウント削除</a>
        </div>
      </div>
    </div>
  </div>
@endsection