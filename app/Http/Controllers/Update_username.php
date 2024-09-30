<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Auth;

class Update_username extends Controller
{
    
  
    
    
    
    
    
    
    public function updateProfileInformation(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
        ]);
    
        $user = auth()->user(); 
    
        // อัปเดตข้อมูล
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        
        // บันทึกการเปลี่ยนแปลง
        $user->save(); 

        return redirect()->back()->with('success', 'Profile information updated successfully.');
        
      
    }

    
}
