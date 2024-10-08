<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\game;
use App\Models\admin;
use App\Models\gametag;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\Authenticate;
class Homecontroller extends Controller
{
    public function index() {
      
        $tags = gametag::all();
        $_Games = game::with('gametags')->get(); // ดึงข้อมูลเกมพร้อมประเภทของเกม
        

        return view("home", compact('_Games','tags'));
    }
    public function serch(Request $request) {
        $tags = gametag::all();
        $request->validate([
            'search_box' => 'nullable|string|max:255',
        ]);
        $_Games = game::where("Game_name","LIKE","%$request->serch_box%")->get(); // ดึงข้อมูลเกมทั้งหมดจากฐานข้อมูล
        return view("home", compact('_Games','tags'));
    }



    public function searchByTag($tag)
    {
        $tags = gametag::all();

        $gametag = gametag::where('gametag_name', $tag)->first();

        if ($gametag) {

            $_Games = $gametag->games()->get();
        } else {
            
            $_Games = collect();  
        }

        
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
