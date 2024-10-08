<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\game;
use App\Models\admin_report;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class adminController extends Controller
{

    public function index()
    {  
        $games = game::all();
        $admin_report = admin_report::all();
        return view('admin' ,compact('admin_report','games')); 
    }
    
    
   
    public function report(Request $request,$report_toadmin) {
        $new_report = new admin_report;
        $new_report->report_topic = $request->report_topics;
        $new_report->report_detail = $request->report_text;
        $new_report->idgames =  $report_toadmin;
        $new_report->user_id = $request->huser_id;
        $new_report->save();
        return view('admin');
    }

    public function delete($idgames){
        $games = game::destroy($idgames);
        return redirect('admin');
    }
}