<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Donatecontroller extends Controller
{
    public function index(){
        return view('donate');
    }
}
