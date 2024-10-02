<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\game;
use App\Models\admin;
use App\Models\gametype;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
class Homecontroller extends Controller
{
    public function index() {
      
        $tags = gametype::all();
        $_Games = game::with('gametypes')->get(); // ดึงข้อมูลเกมพร้อมประเภทของเกม
        

        return view("home", compact('_Games','tags'));
    }
    public function serch(Request $request) {
        $tags = gametype::all();
        $request->validate([
            'search_box' => 'nullable|string|max:255',
        ]);
        $_Games = game::where("Game_name","LIKE","%$request->serch_box%")->get(); // ดึงข้อมูลเกมทั้งหมดจากฐานข้อมูล
        return view("home", compact('_Games','tags'));
    }



    public function searchByTag($tag)
    {
        $tags = gametype::all();
        // Find the tag in the 'gametypes' table
        $gametype = gametype::where('gametype_name', $tag)->first();

        if ($gametype) {
            // Get games associated with this tag
            $_Games = $gametype->games()->get();
        } else {
            // If tag doesn't exist, return an empty result or a message
            $_Games = collect();  // Empty collection
        }

        // Return the view with the filtered games
        return view('home', compact('_Games','tags'));
    }



public function in(){
    if(Auth::id())
    {
        $usertype=Auth()->User()->usertype;
        if($usertype == 'user')
    {
        return view('home');
    }
    else if ($usertype == 'admin')
    {
        return view('admin');
    }
}
}
}
