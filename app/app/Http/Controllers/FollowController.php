<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\Follow;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    public function follow(User $user, Request $request){
        $follow=New Follow();
        $follow->follow_id=$user->id;
        $follow->user_id=Auth::user()->id;
        $follow->save();
        return back();
    }

    public function unfollow(User $user, Request $request){
        $user=Auth::user()->id;
        $follow=Follow::where('user_id', $user)->where('user_id', $user)->first();
        $follow->delete();
        return back();
    }
}
