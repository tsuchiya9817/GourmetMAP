<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Post;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    //メインページ表示
    public function home(){

        //$posts = Post::all();

        $timelines = Post::where('del_flg','=','1')->get();

        //$posts = Auth::user()->post()->get();

        $users = User::get()->first();

        //dd($posts);

        return view('home',compact('timelines','users'));
    }

        //マイページ表示
    public function mypage(){

            //$posts = Auth::user()->post()->get();
    
            //$posts = Post::all();

            $timelines = Post::where('del_flg','=','1')->get();

            $posts = Auth::user()->post()->where('del_flg','=','1')->get();
    
            $users = User::get()->first();
    
            //var_dump($posts);
    
            return view('mypage',compact('posts','users','timelines'));
    }
    
    //ユーザー情報編集画面表示
    public function user_edit_form(int $userId){
    
            $users = User::find($userId);
    
            //dd($users);
    
            return view('user_edit',compact('users'));
    }

    //投稿編集画面表示
    public function post_edit_form(int $postId){
    
        $posts = Post::find($postId);

        //dd($posts);

        return view('post_edit',compact('posts'));
    }

}
