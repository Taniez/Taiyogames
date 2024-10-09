<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\game;
use App\Models\admin_report;
use App\Models\User;
use App\Models\comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;







class adminController extends Controller
{

    public function index()
    {  
        
        $admin_report = admin_report::with('game')->get();
       
        return view('admin' ,compact('admin_report')); 
       
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




    public function reportGame(Request $request, $idgames)
    {
        $game = game::findOrFail($idgames);

        admin_report::create([
            'user_id' => auth()->user()->id,
            'idgames' => $idgames,
            'reason' => $request->input('reason'),
        ]);

        return redirect()->back()->with('success', 'เกมถูกแจ้งแล้ว');
    }

    public function delete($idgames, $idreport){
        $games = game::destroy($idgames);
        DB::table('admin_reports')->where('id', '=', $idreport)->delete();
        return redirect(to: '/admin');
    }

    
}