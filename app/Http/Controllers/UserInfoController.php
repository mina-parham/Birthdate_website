<?php

namespace App\Http\Controllers;

use App\Follow;
use App\UserInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserInfoController extends Controller
{
    //
    public function show()
    {
        $isMyself = 1;
        $user = Auth::user()->id;
        $userinfo = UserInfo::find($user);
//        return $userinfo;
        if ($userinfo == null)
        {
            $userinfo = new UserInfo();
            $userinfo->id = $user;
            $userinfo->save();
        }
//        return $useinfo;
        return view('profile.show', compact('userinfo', 'isMyself'));
    }

    public function edit()
    {
        $id = Auth::user()->id;
        $userinfo = UserInfo::find($id);
        if ($userinfo == null)
        {
            $userinfo = new UserInfo();
            $userinfo->id = $id;
            $userinfo->save();
        }
//        $userinfo = UserInfo::find($id);
        return view('profile.edit', compact('userinfo', 'id'));

    }

    public function searchView()
    {
        return view('profile.search');
    }

    public function search(Request $request)
    {
        $isMyself = 0;
        $input = $request->all();
        $username = $input['username'];
        if ($input['username'] == "")
            return redirect()->back()->withErrors('Please enter a username');
        $userinfo = UserInfo::where('username', $username)->first();
        $id = $userinfo->id;
        $follow_status = Follow::where('user_id', Auth::user()->id)->where('follow_id', $id)->select('status')->first();
        if ($follow_status != null)
            $follow_status = $follow_status->status;
        return view('profile.showResult', compact('userinfo', 'id', 'isMyself', 'follow_status'));

    }

    public function saveProfile(Request $request)
    {
        $id = Auth::user()->id;
        $userinfo = UserInfo::find($id);
        $input = $request->except('username');


        //birthdate input correction
        $birthdate = $input['year'] . '/' . $input['month'] . '/' . $input['day'];
        $input['birthdate'] = $birthdate;

        $photo = $request->file('photo');
        if ($photo != Null)
        {
            $input['photo'] = "/pictures/" . $id . "-photo.jpg";
            $photo->storeAs("", $id . "-photo.jpg");
        }

//        $only = $request->only(['firstName','lastName']);

//        $userinfo->fill($khar)->where('firstName','asghar')->save();

        $userinfo->fill($input);

        $userinfo->save();

        return redirect('/profile/')->with('success', 'saved successfully!');

    }
}
