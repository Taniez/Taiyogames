<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_tier;
use App\Models\game;
use App\Models\Wishlist;
use App\Models\comment;

class userController extends Controller
{
    public function index($userID) {
        $user_tier = user_tier::all();
        $user_ = user::all();
        $_Wish_list = Wishlist::where('user_id', $userID)->take(4)->get();
        $_Num_comment = comment::where('user_id', $userID)->count();
        return view("user_collection", compact('user_tier','user_','_Wish_list','_Num_comment'));
    }
    public function posting($userID) {
        $user_tier = user_tier::all();
        $user_ = user::all();
        $_Wish_list = Wishlist::take(4)->get();
        $_Comments = comment::where('user_id', $userID)->get();
        $_Num_comment = comment::where('user_id', $userID)->count();
        return view("user_posting", compact('user_tier','user_','_Wish_list','_Comments','_Num_comment'));
    }
    public function donate() {
        return view("user_donate");
    }
    public function mygame($userID) {
        $user_tier = user_tier::all();
        $user_ = user::all();
        $_Games = game::where('user_id', $userID)->get();
        $_Wish_list = Wishlist::where('user_id', $userID)->get();
        $_Num_comment = comment::where('user_id', $userID)->count();
        return view("user_mygame", compact('user_tier','user_','_Wish_list','_Num_comment','_Games'));
    }
    public function add_comment(Request $request) {
        $new_comment = new comment;
        $new_comment->user_id = $request->huser_id;
        $new_comment->idgames = $request->game_id;
        $new_comment->comment_detail = $request->detail	;

        $new_comment->save();
        $_Comments = comment::all();
        return back()->withInput(compact('_Comments'));
        // return redirect("user_mygame", ['_Comments'=>$_Comments]);
    }
}
