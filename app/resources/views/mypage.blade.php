@extends('layouts.app')

@section('content')

<div id ="mypage">
    <div id="box11">
        <div id="box12">
            <div id="mypage_icon"><img src="{{ $users->path }}" id="mypage_icon" alt="title" onerror="this.style.display='none'"></div>
            <br>
            <a href="{{ route('user_edit',['id'=>$users['id']]) }}" id="user_edit">ユーザー情報編集</a>
        </div>
        <div id="stetus">
            <table id="stetus">
                <tr>
                    <th>{{ $users->name }}</th>
                    <th>フォロー数:{{ $following }}</th>
                    <th>いいねした数:{{ $likeing }}</th>
                </tr>
                <tr>
                    <td>ID:{{ $users->id }}</td>
                    <td>フォロワー数:{{ $followed }}</td>
                    <td>いいねされた数:{{ $liked }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div id="profile">{{ $users->profile }}</div>
    <div id="box13">
    <div id="timeline">
    @foreach($posts as $post)
        <div id="user_post">
            <div id="post_detail">
                <div id="img">
                <div id=user_icon><img src="{{ asset($post->user->path) }}" id="user_icon"></div>
                    <div id=post_user_detail>
                        <div>{{ $post->user->name }}</div>
                        <div>{{ $post->user_id }}</div>
                        <div>{{ \Carbon\carbon::parse($post->updated_at)->format("y/m/d") }}</div>
                    </div>
                    <div id="post_message">
                        <div>{{ $post->restrant }}</div>
                        <div>{{ $post->message }}</div>
                        <div><img src="{{ asset($post->path) }}" id="img" alt="title" onerror="this.style.display='none'"></div>
                    </div>
                    <div id="button_box">
                    <button><a href="{{ route('post_edit',['id'=>$post['id']]) }}" id="post_edit">編集</a></button>
<button id="like">
<!-- もし$likeがあれば＝ユーザーが「いいね」をしていたら -->
@if($post->likes->where('user_id', Auth::user()->id)->count() == 1)
<!-- 「いいね」取消用ボタンを表示 -->
<a href="{{ route('unlike', $post) }}" id="like">
		いいねを外す
		<!-- 「いいね」の数を表示 -->
		<span class="badge">
			{{ $post->likes->count() }}
		</span>
	</a>
@else
<!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
<a href="{{ route('like', $post) }}" id="like">
		いいねする
		<!-- 「いいね」の数を表示 -->
		<span class="badge">
			{{ $post->likes->count() }}
		</span>
	</a>
@endif
</button>
                    
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
</div>
</div>

@include('layouts.timeline')

@endsection