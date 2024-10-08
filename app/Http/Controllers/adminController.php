<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\admin;
use App\Models\admin_report;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{
    public function isaddmin($adminid, $adminpassword) {
        $admin_report = admin_report::all();
        // Retrieve the admin that matches the given adminid
        $admin = admin::all()->first();
        // Check if the admin exists and the password matches
        if ($admin && $admin->admin_password === $adminpassword) {
            return view('admin',compact("admin_report"));
        } else {
            return view('home');
        }
    }
    public function report(Request $request,$report_toadmin) {
        $new_report = new admin_report;
        $new_report->report_topic = $request->report_topics;
        $new_report->report_detail = $request->report_text;
        $new_report->idgames =  $report_toadmin;
        $new_report->user_id = $request->huser_id;
        $new_report->save();
        return view('home');
    }
}