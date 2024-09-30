<?php

namespace App\Http\Controllers;
use App\Models\admin;
use App\Models\gametype;
use Illuminate\Http\Request;
use App\Models\game;
use App\Models\comment;

class gameController extends Controller
{
    public function index() {
        return view("game");
    }

    public function gameserch($idgames) {
        $tags = gametype::all();
        $_Games = game::where('idgames', $idgames)->first();
        $_Comments = comment::where('idgames', $idgames)->get();
        
        return view("game", compact('_Games','tags','_Comments'));
    }
}
