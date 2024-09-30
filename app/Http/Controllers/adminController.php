<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\admin_report;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class adminController extends Controller
{
    public function index() {
        $_Admin = admin::first();
        $_Report = admin_report::all();
        return view("admin", compact('_Admin', ));
    }

public function in() {
    if(Auth::id())
    {
        $usertype=Auth()->user()->usertype;
    if($usertype == 'user')
    {
        return view('index');
    }
    else if ($usertype == 'admin')
    {
        return view('admin');
    }
}
}
}