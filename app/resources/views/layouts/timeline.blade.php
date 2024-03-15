<div id="box">

<div>
  <form action="" method="GET" class="search-form">
  <label>
    <input type="text" name="keyword" value="{{ $keyword }}" placeholder="投稿検索" >
    </label>
    <button type="submit" aria-label="検索"></button>
  </form>
</div>
    <div id=timeline>
    @foreach($timelines as $timeline)
        <div id="user_post">
            <div id="post_detail">
                <div id="box3">
                <div id=user_icon><a href="{{ route('user_page',['id'=>$timeline['user_id']]) }}" ><img src="{{ asset(optional($timeline->user)->path) }}" id="user_icon" alt="title" onerror="this.style.display='none'"></a></div>
                    <div id=post_user_detail>
                        <div><a href="{{ route('user_page',['id'=>$timeline['user_id']]) }}" id="a">{{ optional($timeline->user)->name }} </a></div>
                        <div><a href="{{ route('user_page',['id'=>$timeline['user_id']]) }}" id="a">ID:{{ $timeline->user_id }}</a></div>
                        <div>{{ Carbon\carbon::parse($timeline->updated_at)->format("y/m/d") }}</div>
                    </div>
                    <div id="post_message">
                        <div><a href="javascript: void(0);" onclick="createMarker( '{{ $timeline->restrant }}','{{ $timeline->adress }}','{{ $timeline->lat }}','{{ $timeline->lng }}')">{{ $timeline->restrant }}</a></div>
                        <div>{{ $timeline->message }}</div>
                        <div><img src="{{ asset($timeline->path) }}" id="img" alt="title" onerror="this.style.display='none'"></div>
                    </div>
                    <div id="button_box">
                    <button id="like">
<!-- もし$likeがあれば＝ユーザーが「いいね」をしていたら -->
@if($timeline->likes()->where('user_id', Auth::user()->id)->count() == 1)
<!-- 「いいね」取消用ボタンを表示 -->
<a href="{{ route('unlike', $timeline) }}" id="like">
		いいねを外す
		<!-- 「いいね」の数を表示 -->
		<span class="badge">
			{{ $timeline->likes->count() }}
		</span>
    </a>
@else
<!-- まだユーザーが「いいね」をしていなければ、「いいね」ボタンを表示 -->
<a href="{{ route('like', $timeline) }}" id="like">
		いいねする
		<!-- 「いいね」の数を表示 -->
		<span class="badge">
			{{ $timeline->likes->count() }}
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
    <div id=post>
        <div class="btn btn--orange btn--radius" id="post_button">投稿する</div>
    </div>
    <button class="side" style="width:1%;height:10%;background-color:white;opacity:1.0;position:absolute;top:40%;left:100%;border-radius: 0px 10px 10px 0px;"></button>
</div>

<div id="back">
    <div id="post_form">
        <div id="box2">
            <button id=post_form_close>✖</button>
                <div id="user_post">
                    <div id="post_form_detail">
                        <div id=my_icon><img src="{{ asset($users->path) }}" id="my_icon" alt="title" onerror="this.style.display='none'"></div>
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <label for='restrant'>店名</label>
                                    <input type='text' class='form-control' name='restrant'>
                                <label for='message' class='mt-2'>投稿内容</label>
                                    <textarea class='form-control' name='message' ></textarea>
                                <label for='post_image' class='mt-4'></label>
                                    <input type="file" name='post_image' accept=".png, .jpg, .jpeg">
                                    <button type='submit' class='btnbtn-primary'>投稿する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>