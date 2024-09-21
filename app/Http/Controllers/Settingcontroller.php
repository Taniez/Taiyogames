<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Settingcontroller extends Controller
{
    public function show()
    {
        // Logic for showing settings by id
        return view('profile.Setting');
    }
}
