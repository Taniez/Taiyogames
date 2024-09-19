<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;

class adminController extends Controller
{
    public function index() {
        $_Admin = admin::first();
        return view("admin", compact('_Admin'));
    }
}
