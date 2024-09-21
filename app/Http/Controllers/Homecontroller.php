<?php

namespace App\Http\Controllers;
use App\Models\game;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
    public function index()
    {
        $games = game::all(); // ดึงข้อมูลเกมทั้งหมดจากฐานข้อมูล
        return view('home', compact('games'));
    }
}
