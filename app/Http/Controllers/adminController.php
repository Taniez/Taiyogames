<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\admin_report;

class adminController extends Controller
{
    public function index() {
        $_Admin = admin::first();
        $_Report = admin_report::all();
        return view("admin", compact('_Admin', ));
    }
}
