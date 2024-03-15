<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\FollowController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::group(['middlewere'=>'auth'],function(){

    //メインページを表示
    Route::get('/',[DisplayController::class,'home'])->name('home');
    //投稿登録
    Route::post('/',[RegistrationController::class,'post']);

    //マイページ表示
    Route::get('/mypage',[DisplayController::class,'mypage'])->name('mypage');
    //投稿登録
    Route::post('/mypage',[RegistrationController::class,'post']);

    //ユーザーページ表示
    Route::get('/user_page/{id}',[DisplayController::class,'user_page'])->name('user_page');
    
    //ユーザー情報編集ページ表示
    Route::get('/user_edit/{id}',[DisplayController::class,'user_edit_form'])->name('user_edit');
    Route::post('/user_edit/{id}',[RegistrationController::class,'user_edit']);

    //投稿編集ページ表示
    Route::get('/post_edit/{id}',[DisplayController::class,'post_edit_form'])->name('post_edit');
    Route::post('/post_edit/{id}',[RegistrationController::class,'post_edit']);

    //投稿論理削除
    Route::get('/softdelete_post/{id}',[RegistrationController::class,'softDeletePost'])->name('softdelete.post');

    //いいねする
    Route::get('/community/like/{post}', [LikeController::class, 'like'])->name('like');
    //いいねを消す
    Route::get('/community/unlike/{post}', [LikeController::class, 'unlike'])->name('unlike');

    //フォローする
    Route::get('/community/follow/{user}', [FollowController::class, 'follow'])->name('follow');
    //フォローを消す
    Route::get('/community/unfollw/{user}', [FollowController::class, 'unfollow'])->name('unfollow');

    //ログアウトする
    Route::get('/logout', 'Auth\LoginController@logout');

    //ユーザー管理画面表示
    Route::get('/admin/user',[DisplayController::class,'admin_user'])->name('admin.user');

    //投稿管理画面表示
    Route::get('/admin/post',[DisplayController::class,'admin_post'])->name('admin.post');

    //レストラン管理画面表示
    Route::get('/admin/restrant',[DisplayController::class,'admin_restrant'])->name('admin_restrant');

    //レストラン登録画面表示
    Route::get('/admin/restrant/regist',[DisplayController::class,'admin_restrant_regist'])->name('admin_restrant_regist');

    //レストラン登録
    Route::post('/admin/restrant/regist',[RegistrationController::class,'admin_restrant_regist']);

    //レストラン編集画面表示
    Route::get('/admin/restrant/edit/{id}',[DisplayController::class,'admin_restrant_edit'])->name('admin_restrant_edit');

    //レストラン編集登録
    Route::post('/admin/restrant/edit/{id}',[RegistrationController::class,'admin_restrant_edit']);

    //ユーザー物理削除
    Route::get('/admin/user/delete/{id}',[RegistrationController::class,'admin_user_Delete'])->name('admin_user_Delete');

    //投稿物理削除
    Route::get('/admin/post/delete/{id}',[RegistrationController::class,'admin_post_Delete'])->name('admin_post_Delete');

    //レストラン物理削除
    Route::get('/admin/restrant/delete/{id}',[RegistrationController::class,'admin_restrant_Delete'])->name('admin_restrant_Delete');
});
