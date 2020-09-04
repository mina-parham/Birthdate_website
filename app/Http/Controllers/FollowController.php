<?php

namespace App\Http\Controllers;

use App\Follow;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowController extends Controller
{
    //
    public function follow($username)
    {
        $f = new Follow();
        $user = UserInfo::where('id',Auth::user()->id)->first();
        $f->user_id = $user->id;
        $user = UserInfo::where('username',$username)->first();
        $f->follow_id = $user->id;
        $f->status = 1;
        $f->save();
        return redirect()->back()->with('success','follow request sent');
    }

    public function accept($id)
    {
        $follow = Follow::where('user_id',$id)->where('follow_id',Auth::user()->id)->where('status','1')->first();
        $follow->status = 2;
        $follow->save();
        return redirect()->back();
    }
}
