<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Communitycontroller extends Controller
{
    public function index() {
        return view("community");
    }
}
