<?php

namespace App\Http\Controllers;

use App\Follow;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $followRequest = Follow::where('follow_id',Auth::user()->id)->where('status','1')->get();
        $users = null;
        foreach ($followRequest as $follow)
        {
            $users[$follow->id] = UserInfo::where('id',$follow->user_id)->first();
        }
        return view('home',compact('users'));
    }
}
