<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Post;
use App\Like;
use App\Follow;
use App\Restrant;
use Illuminate\Support\Facades\Auth;

class DisplayController extends Controller
{
    //メインページ表示
    public function home(Post $post,Request $request){

        if (Auth::id() === 1){

            return view('admin.admin');

        } elseif (Auth::check()) {

            $restrant = new Restrant;

            $users = User::get()->first();

            $keyword = $request->input('keyword');

            //$query = Post::query()->join('restrants','posts.restrant','=','restrants.restrant')->select('*','posts.id as id')->whereIn('user_id', Auth::user()->follows()->pluck('follow_id'))->
            //                       orWhere('user_id', Auth::user()->id)->where('del_flg','=','1')->orderby('updated_at','DESC'); 
            
            $query = $post->join('restrants','posts.restrant','=','restrants.restrant')->select('*','posts.id as id')->whereIn('user_id', Auth::user()->follows()->pluck('follow_id'))->
                                  orWhere('user_id', Auth::user()->id)->where('del_flg','=','1')->orderby('updated_at','DESC');
    
            if(!empty($keyword)) {
                $query->where('restrants.restrant', 'LIKE', "%{$keyword}%")
                      ->orWhere('message', 'LIKE', "%{$keyword}%");
            }

            $timelines = $query->get();

            //dd($timelines);

            return view('home',compact('timelines','users','keyword'));

        } else {
            // ログインしていなかったら、Login画面を表示
            return view('auth/login');
        }
    }

        //マイページ表示
    public function mypage(Post $post,Request $request){

            $keyword = $request->input('keyword');

            $query = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('follow_id'))->
                                  orWhere('user_id', Auth::user()->id)->where('del_flg','=','1')->orderby('updated_at','DESC'); 
    
            if(!empty($keyword)) {
                $query->where('restrant', 'LIKE', "%{$keyword}%")
                      ->orWhere('message', 'LIKE', "%{$keyword}%");
            }

            $timelines = $query->get();

            $posts = Auth::user()->post()->where('del_flg','=','1')->orderby('updated_at','DESC')->get();
    
            $users = Auth::user();

            $like = Like::where('post_id', $post->id)->where('user_id', auth()->user()->id)->first();

            $likeing = Like::where('user_id',$users->id)->count();

            $liked = Like::where('post_user_id', $users->id)->count();

            $following=Follow::where('user_id',$users->id)->count();

            $followed=Follow::where('follow_id',$users->id)->count();
    
            return view('mypage',compact('posts','users','timelines','like','likeing','liked','following','followed','keyword'));
    }

    //ユーザーページ表示
    public function user_page(int $id,Request $request){

        if(Auth::id() === $id){

            return redirect('/mypage');

        } else {

        $users = User::find($id);

        $posts = Post::where('user_id',$id)->where('del_flg','=','1')->orderby('updated_at','DESC')->get();

        $keyword = $request->input('keyword');

            $query = Post::query()->whereIn('user_id', Auth::user()->follows()->pluck('follow_id'))->
                                  orWhere('user_id', Auth::user()->id)->where('del_flg','=','1')->orderby('updated_at','DESC'); 
    
            if(!empty($keyword)) {
                $query->where('restrant', 'LIKE', "%{$keyword}%")
                      ->orWhere('message', 'LIKE', "%{$keyword}%");
            }

            $timelines = $query->get();

        $likeing=Like::where('user_id',$users->id)->count();

        $liked = Like::where('post_user_id', $users->id)->count();

        $following=Follow::where('follow_id',$users->id)->count();

        $followed=Follow::where('user_id',$users->id)->count();

        return view('user_page',compact('users','timelines','posts','likeing','following','followed','liked','keyword'));
        }
    }
    
    //ユーザー情報編集画面表示
    public function user_edit_form(int $userId){
    
            $users = User::find($userId);
    
            return view('user_edit',compact('users'));
    }

    //投稿編集画面表示
    public function post_edit_form(int $postId){
    
        $posts = Post::find($postId);

        return view('post_edit',compact('posts'));
    }

    //ユーザー管理画面表示
    public function admin_user(User $user,Request $request){

        $keyword = $request->input('keyword');

            $query = User::query()->orderby('created_at','ASC'); 
    
            if(!empty($keyword)) {
                $query->where('name', 'LIKE', "%{$keyword}%")
                      ->orWhere('email', 'LIKE', "%{$keyword}%");
            }

            $users = $query->get();

        return view('admin.admin_user',compact('users','keyword'));
    }

    //投稿管理画面表示
    public function admin_post(Post $post,Request $request){
    
        $keyword = $request->input('keyword');

            $query = Post::query()->orderby('created_at','ASC'); 
    
            if(!empty($keyword)) {
                $query->where('user_id', 'LIKE', "%{$keyword}%")
                      ->orWhere('restrant', 'LIKE', "%{$keyword}%");
            }

            $posts = $query->get();

        return view('admin.admin_post',compact('posts','keyword'));
    }

    //レストラン管理画面表示
    public function admin_restrant(Restrant $restrant,Request $request){
    
        $keyword = $request->input('keyword');

            $query = Restrant::query()->orderby('id','ASC'); 
    
            if(!empty($keyword)) {
                $query->where('adress', 'LIKE', "%{$keyword}%")
                      ->orWhere('restrant', 'LIKE', "%{$keyword}%");
            }

            $restrants = $query->get();

        return view('admin.admin_restrant',compact('restrants','keyword'));
    }

    //レストラン画面表示
    public function admin_restrant_regist(){

        return view('admin.admin_restrant_regist');
    }
    
    //レストラン画面表示
    public function admin_restrant_edit(int $id){

        $restrant = Restrant::find($id);

        return view('admin.admin_restrant_edit',compact('restrant'));
    }
}
