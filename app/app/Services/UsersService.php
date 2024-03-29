<?php

namespace App\Services;

use Illuminate\Http\Request;
use Carbon\Carbon;

class UsersService
{

	/**
     * パスワードリセット
     */

    // メールアドレスからユーザー情報取得
    public function findFromMail(string $mail)
    {
        $user = \App\Models\User::where('mail', $mail)->first();
        return $user;
    }

    // トークン, 有効期限を登録
    public function updateOrCreateUser(int $userId)
    {
        $now = Carbon::now();
        // $userIdをハッシュ化
        $hashedToken = hash('sha256', $userId);
        $userToken = \App\Models\User::updateOrCreate(
                        [
                            'id' => $userId,
                        ],
                        [
                        // $hashedTokenを含むトークンを作成
                        'rest_password_access_key' => uniqid(rand(), $hashedToken),
                        // トークンの有効期限を現在から24時間後に設定
                        'rest_password_expire_data' => $now->addHours(24)->toDateTimeString()
                        ]);
        return $userToken;
    }

    // トークンからユーザー情報を取得
    public function getUserTokenFromUser(string $token)
    {
        $userToken = \App\Models\User::where('rest_password_access_key', $token)->first();
        return $userToken;
    }

    // トークンからメールアドレスを取得
    public function getUserMailByResetToken(string $resetToken)
    {
        $userMail = \App\Models\User::select('mail')
        ->where('rest_password_access_key', $resetToken)->first();
        return $userMail;
    }

    // パスワード更新
    public function updateUserPassword(string $password, int $userId)
    {
        \App\Models\User::where('id', $userId)->update(['password' => $password]);
    }
}