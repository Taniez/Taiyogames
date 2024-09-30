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
        {

        }
    }

    public function riz () {
        $_Comments = comment::all();
        return show_source("comments",compact('_Comments'));
            }
            public function showLoginForm()
    {
        return view('auth.admin-login'); // create this view for admin login
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::admins()->is_admin) {
                return redirect()->route('admin.dashboard');
            }

            Auth::logout();
            return redirect()->route('admin.login')->withErrors('Access denied');
        }

        return redirect()->back()->withErrors('Invalid login details');
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