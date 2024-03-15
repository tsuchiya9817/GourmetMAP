@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col col-md-offset-3 col-md-6">
        <nav class="card mt-5">
          <div class="card-header">レストラン編集画面</div>
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
                <label for="restrant">店名</label>
                <input type="text" class="form-control" id="restrant" name="restrant" value="{{ $restrant->restrant }}" />
              </div>
              <div class="form-group">
                <label for="adress">住所</label>
                <input type="text" class="form-control" id="adress" name="adress" value="{{ $restrant->adress }}" />
              </div>
              <div class="form-group">
                <label for="lat">緯度</label>
                <input type="text" class="form-control" id="lat" name="lat" value="{{ $restrant->lat }}" />
              </div>
              <div class="form-group">
                <label for="lng">経度</label>
                <input type="text" class="form-control" id="lng" name="lng" value="{{ $restrant->lng }}" />
              </div>
              <div class="text-right">
                <button type="submit" class="btn btn-primary">登録</button>
              </div>
            </form>
          </div>
        </nav>
      </div>
    </div>
  </div>
@endsection