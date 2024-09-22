<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\game;

class gameController extends Controller
{
    public function index() {
        return view("game");
    }
}
