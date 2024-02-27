<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{

    //投稿登録
    public function post(Request $request){

        $post = new Post;

        $post->restrant = $request->restrant;
        $post->message = $request->message;
        //$post->image = $request->image;

        $dir = 'post_image';

        // アップロードされたファイル名を取得
        $file_name = $request->file('post_image')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('post_image')->storeAs('public/' . $dir, $file_name);

        // ファイル情報をDBに保存
        $post->post_image = $file_name;
        $post->path = 'storage/' . $dir . '/' . $file_name;

        //Auth::user();post()->save($posts);

        Auth::user()->post()->save($post);

        return redirect('/');
    }

    //ユーザー情報編集
        public function user_edit(int $userId,Request $request){

        $instance = new User;
        $record = $instance->find($userId);

        $record->name = $request->name;
        $record->email = $request->email;
        $record->profile = $request->profile;

        $dir = 'user_icon';

        // アップロードされたファイル名を取得
        $file_name = $request->file('user_icon')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('user_icon')->storeAs('public/' . $dir, $file_name);

        // ファイル情報をDBに保存
        $record->user_icon = $file_name;
        $record->path = 'storage/' . $dir . '/' . $file_name;

        $record->save();

        return redirect('mypage');
    }

    //投稿編集
    public function post_edit(int $postId,Request $request){

        $instance = new Post;
        $record = $instance->find($postId);

        $record->restrant = $request->restrant;
        $record->message = $request->message;

        $dir = 'post_image';

        // アップロードされたファイル名を取得
        $file_name = $request->file('post_image')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('post_image')->storeAs('public/' . $dir, $file_name);

        // ファイル情報をDBに保存
        $record->post_image = $file_name;
        $record->path = 'storage/' . $dir . '/' . $file_name;

        $record->save();

        return redirect('mypage');
    }

    //投稿論理削除
    public function softDeletePost(int $postId,Request $request){

        $instance = new Post;
        $record = $instance->find($postId);

        $record->del_flg = $request->del_flg;

        $record->save();

        return redirect('mypage');
    }
}
