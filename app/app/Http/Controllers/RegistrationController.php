<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Restrant;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{

    //投稿登録
    public function post(Request $request){

            if($request->post_image === null){
                $post = new Post;

                $post->restrant = $request->restrant;
                $post->message = $request->message;
                $post->post_image = $request->post_image;

                Auth::user()->post()->save($post);

                return back();

            }else{

                $post = new Post;

                $post->restrant = $request->restrant;
                $post->message = $request->message;

        $dir = 'post_image';

        // アップロードされたファイル名を取得
        $file_name = $request->file('post_image')->getClientOriginalName();

        // 取得したファイル名で保存
        $request->file('post_image')->storeAs('public/' . $dir, $file_name);

        // ファイル情報をDBに保存
        $post->post_image = $file_name;
        $post->path = 'storage/' . $dir . '/' . $file_name;

        Auth::user()->post()->save($post);

        return back();
        }
        
    }

    //ユーザー情報編集
        public function user_edit(int $userId,Request $request){

            if($request->user_icon === null){

                $instance = new User;
        $record = $instance->find($userId);

        $record->name = $request->name;
        $record->email = $request->email;
        $record->profile = $request->profile;
        $record->user_icon = $request->user_icon;

        $record->save();

        return redirect('mypage');

            }else{

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
    }

    //投稿編集
    public function post_edit(int $postId,Request $request){

        if($request->post_image === null){

            $instance = new Post;
        $record = $instance->find($postId);

        $record->restrant = $request->restrant;
        $record->message = $request->message;
        $record->post_image = $request->post_image;

        $record->save();

        return redirect('mypage');

        }else{

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
    }

    //投稿論理削除
    public function softDeletePost(int $postId,Request $request){

        $instance = new Post;
        $record = $instance->find($postId);

        $record->del_flg = $request->del_flg;

        $record->save();

        return redirect('mypage');
    }

    //レストラン登録
    public function admin_restrant_regist(Request $request){

        $restrant = new Restrant;

        $restrant->restrant = $request->restrant;
        $restrant->adress = $request->adress;
        $restrant->lat = $request->lat;
        $restrant->lng = $request->lng;

    $restrant->save();

    return redirect('/admin/restrant');
    }

    //レストラン編集登録
    public function admin_restrant_edit(int $id,Request $request){

        $instance = new Restrant;
        $restrant = $instance->find($id);

        $restrant->restrant = $request->restrant;
        $restrant->adress = $request->adress;
        $restrant->lat = $request->lat;
        $restrant->lng = $request->lng;

    $restrant->save();

    return redirect('/admin/restrant');
    }

    //ユーザー物理削除
    public function admin_user_Delete(int $id){
    
        $user = User::find($id);
        $user->delete();

        return redirect('/admin/user');
    }

    //投稿物理削除
    public function admin_post_Delete(int $id){
    
        $post = Post::find($id);
        $post->delete();

        return redirect('/admin/post');
    }

    //レストラン物理削除
    public function admin_restrant_Delete(int $id){
    
        $restrant = Restrant::find($id);
        $restrant->delete();

        return redirect('/admin/restrant');
    }
}
