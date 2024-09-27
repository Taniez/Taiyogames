<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class userController extends Controller
{
    public function index() {
        return view("user_collection");
    }
    public function posting() {
        return view("user_posting");
    }
    public function donate() {
        return view("user_donate");
    }
}
