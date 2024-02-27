

<div id="box">
    <form action="" class="search-form">
        <label>
            <input type="text" placeholder="キーワードを入力">
        </label>
        <button type="submit" aria-label="検索"></button>
    </form>
    <div id=timeline>
    @foreach($timelines as $timeline)
        <div id="user_post">
            <div id="post_detail">
                <div id="box3">
                <div id=user_icon></div>
                    <div id=post_user_detail>
                        <div>ユーザーネーム</div>
                        <div>{{ $timeline->user_id }}</div>
                        <div>{{ Carbon\carbon::parse($timeline->created_at)->format("y/m/d") }}</div>
                    </div>
                    <div id="post_message">
                        <div>{{ $timeline->restrant }}</div>
                        <div>{{ $timeline->message }}</div>
                        <div><img src="{{ asset($timeline->path) }}" id="img"></div>
                    </div>
                    <div id="button_box">
                    <button id="like">like</button>
                    <button id="follow">follow</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    <div id=post>
        <div class="btn btn--orange btn--radius" id="post_button">投稿する</div>
    </div>
</div>
<div id="back">
    <div id="post_form">
        <div id="box2">
            <button id=post_form_close>✖</button>
                <div id="user_post">
                    <div id="post_form_detail">
                        <div id=my_icon><img src="{{ asset($users->path) }}" id="my_icon"></div>
                            <form action="" method="post" enctype="multipart/form-data">
                                @csrf
                                <label for='restrant'>店名</label>
                                    <input type='text' class='form-control' name='restrant'/>
                                <label for='message' class='mt-2'>投稿内容</label>
                                    <textarea class='form-control' name='message'></textarea>
                                    <input type="file" name='post_image'>
                                    <button type='submit' class='btnbtn-primary'>投稿する</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>