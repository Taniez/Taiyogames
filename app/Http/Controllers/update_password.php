<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class update_password extends Controller
{
    public function index() {
        return view("profile.update_password");
    }
}

