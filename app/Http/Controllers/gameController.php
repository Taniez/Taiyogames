<?php

namespace App\Http\Controllers;
use App\Models\admin;
use App\Models\gametag;
use Illuminate\Http\Request;
use App\Models\game;
use App\Models\comment;
use App\Models\developer_log;

class gameController extends Controller
{
    public function index() {
        return view("game");
    }

    public function gameserch($idgames) {
        $tags = gametag::all();
        $_Games = game::where('idgames', $idgames)->first();
        $_Comments = comment::where('idgames', $idgames)->get();
        $_Num_comment = comment::where('idgames', $idgames)->count();
        $_Dev_logs = developer_log::where('idgames', $idgames)->get();
        
        return view("game", compact('_Games','tags','_Comments','_Num_comment','_Dev_logs'));
    }
}
