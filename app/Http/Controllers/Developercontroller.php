<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Developercontroller extends Controller
{
    public function index(){
        return view('developer');
    }
    
}
