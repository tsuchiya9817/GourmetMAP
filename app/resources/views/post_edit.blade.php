@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header">投稿編集</div>
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
                <label for="name">店名</label>
                <input type="text" class="form-control" id="restrant" name="restrant" value="{{ $posts['restrant'] }}" />
              </div>
              <div class="form-group">
              <label for='message' class='mt-2'>投稿内容</label>
                <textarea cols="40" rows="10" class='form-control' name='message'>{{ $posts['message'] }}</textarea>
              </div>
              <div class="form-group">
              <label for="post_image">画像</label>
                <input type="file"  id="post_image" name='post_image' value="{{ $posts['path'] }}">
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">登録</button>
              </div>
            </form>
          </div>
        </nav>
        <div class="text-center">
          <a href="{{ route('softdelete.post', ['id' => $posts['id']]) }}">投稿削除</a>
        </div>
      </div>
    </div>
  </div>
@endsection