<?php

namespace App\Http\Controllers;

use App\User;
use App\WishList;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishListController extends Controller
{
    public function show()
    {
        $userID = Auth::user()->id;
        $wishlists = WishList::where('user_id',$userID)->get();
        return view('wishlist.show',compact('wishlists'));
    }

    public function delete($id)
    {
        $wishItem = WishList::where('id',$id)->first();
        $wishItem->delete();
        return response()->json('success!', 200);
    }

    public function add($title,$content)
    {
        $wishItem = new WishList();
        $user = Auth::id();
        $wishItem->user_id = $user;
        $wishItem->title= $title;
        $wishItem->content= $content;
        $wishItem->save();
        return response()->json('success!', 200);

    }

    public function Edit($title,$content)
    {
        $wishItem = WishList::where('title',$title)->where('');
        $user = Auth::id();
        $wishItem->user_id = $user;
        $wishItem->title= $title;
        $wishItem->content= $content;
        $wishItem->save();
        return response()->json('success!', 200);

    }
    //
}
