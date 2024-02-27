<?php

use App\Http\Controllers\DisplayController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\TestMailController;
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
    //メインページ投稿登録
    Route::post('/',[RegistrationController::class,'post']);

    //マイページ表示
    Route::get('/mypage',[DisplayController::class,'mypage'])->name('mypage');
    //マイページ投稿登録
    Route::post('/mypage',[RegistrationController::class,'post']);
    
    //ユーザー情報編集ページ表示
    Route::get('/user_edit/{id}',[DisplayController::class,'user_edit_form'])->name('user_edit');
    Route::post('/user_edit/{id}',[RegistrationController::class,'user_edit']);

    //投稿編集ページ表示
    Route::get('/post_edit/{id}',[DisplayController::class,'post_edit_form'])->name('post_edit');
    Route::post('/post_edit/{id}',[RegistrationController::class,'post_edit']);

    //投稿論理削除
    Route::get('/softdelete_post/{id}',[RegistrationController::class,'softDeletePost'])->name('softdelete.post');

});
