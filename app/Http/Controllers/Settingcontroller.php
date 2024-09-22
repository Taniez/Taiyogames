<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Settingcontroller extends Controller
{
    public function show()
    {
        return view('profile.Setting');
    }
}
