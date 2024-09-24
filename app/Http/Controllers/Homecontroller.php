<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\game;
use App\Models\admin;

class Homecontroller extends Controller
{
    public function index() {
        $_Games = game::all(); // ดึงข้อมูลเกมทั้งหมดจากฐานข้อมูล
        return view("home", compact('_Games'));
    }
    public function serch(Request $request) {
        $_Games = game::where("Game_name","LIKE","%$request->serch_box%")->get(); // ดึงข้อมูลเกมทั้งหมดจากฐานข้อมูล
        return view("home", compact('_Games'));
    }
}
