<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\game;
use App\Models\admin;

class Homecontroller extends Controller
{
    public function index() {
        $_Admin = admin::first(); // ดึงข้อมูลเกมทั้งหมดจากฐานข้อมูล
        return view("dashboard", compact('_Games'));
    }
}
