<?php

namespace App\Http\Controllers;
use App\Models\admin;
use App\Models\gametype;
use Illuminate\Http\Request;
use App\Models\game;

class gameController extends Controller
{
    public function index() {
        return view("game");
    }

    public function gameserch($idgames) {
        $tags = gametype::all();
        $_Games = game::where('idgames', $idgames)->first();
        return view("game", compact('_Games','tags'));
    }
}
