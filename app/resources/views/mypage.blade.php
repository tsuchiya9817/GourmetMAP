@extends('layouts.app')

@section('content')

<div id ="mypage">
    <div id="box11">
        <div id="box12">
            <div id="mypage_icon"><img src="{{ $users->path }}" id="mypage_icon"></div>
            <a href="{{ route('user_edit',['id'=>$users['id']]) }}" id="user_edit">ユーザー情報編集</a>
        </div>
        <div id="stetus">
            <table id="stetus">
                <tr>
                    <th>{{ $users->name }}</th>
                    <th>フォロー数:0000</th>
                    <th>いいねした数:0000</th>
                </tr>
                <tr>
                    <td>{{ $users->id }}</td>
                    <td>フォロワー数:0000</td>
                    <td>いいねされた数:0000</td>
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
                        <div>{{ \Carbon\carbon::parse($post->created_at)->format("y/m/d") }}</div>
                    </div>
                    <div id="post_message">
                        <div>{{ $post->restrant }}</div>
                        <div>{{ $post->message }}</div>
                        <div><img src="{{ asset($post->path) }}" id="img"></div>
                    </div>
                    <div id="button_box">
                    <button><a href="{{ route('post_edit',['id'=>$post['id']]) }}" id="post_edit">編集</a></button>
                    <button id="like">like</button>
                    <button id="follow">follow</button>
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