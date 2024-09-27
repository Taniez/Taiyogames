<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\user_tier;
use App\Models\game;
use App\Models\Wishlist;

class userController extends Controller
{
    public function index() {
    // $user_tier = user_tier::find(1);
    // $user_ = User::whereBelongsTo($user_tier)->get();
        $user_tier = user_tier::all();
        $user_ = user::all();
        $_Wish_list = Wishlist::all();
        return view("user_collection", compact('user_tier','user_','_Wish_list'));
    }
    public function posting() {
        return view("user_posting");
    }
    public function donate() {
        return view("user_donate");
    }
}
