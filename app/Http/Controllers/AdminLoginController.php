<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.admin-login'); // create this view for admin login
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            if (Auth::user()->is_admin) {
                return redirect()->route('admin-login');
            }

            Auth::logout();
            return redirect()->route('admin.login')->withErrors('Access denied');
        }

        return redirect()->back()->withErrors('Invalid login details');
    }
}