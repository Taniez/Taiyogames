<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\game;
class Devmanage_controler extends Controller
{
    public function index(){
        $games = game::all();
        return view('Devmanage', compact('games'));
     }
    //
    public function create(Request $request){
        $new_game =new game;
        $new_game-> Game_name = $request-> g_name;
        $new_game-> Game_info = $request-> g_details;
        $new_game-> version = $request-> g_version;
        $imageName = time().'.'.$request->g_img->extension();
        $request->g_img->move(public_path('img'), $imageName);
        $new_game->Game_preview = 'img/'.$imageName;
        $new_game-> Game_dowload_link = $request-> g_link;
        $new_game->save();
        return redirect('/Devmanage');
    }
}
