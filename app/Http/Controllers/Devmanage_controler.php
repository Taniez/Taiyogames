<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\screenshot;
use Illuminate\Http\Request;
use App\Models\gametag;
use App\Models\game;

use App\Models\developer_log;
use App\Models\User;

class Devmanage_controler extends Controller
{
    public function index(){
        if (Auth::check()) {
            $user = Auth::user();
    
            // Fetch games that belong to the current user
            $games = $user->games;
    
            return view('Devmanage', compact('games'));
        }
    
        // Redirect to login or another appropriate page if not authenticated
        return redirect()->route('login');
    
     }
    //
    public function create(Request $request){
        $request->validate([
            'g_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            'g_bg' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20048', // remove required here
        ]);
        

       
        $new_game = new game;
    
        // Assign other request values
        $new_game->Game_name = $request->g_name;
        $new_game->Game_info = $request->g_details;
        $new_game->version = $request->g_version;
        $new_game->Status = $request->g_status;
        
        // Handle image upload
        if ($request->hasFile('g_img') && $request->file('g_img')->isValid()) {
            $imageName = time() . '.' . $request->g_img->extension();
            $request->g_img->move(public_path('img'), $imageName);
            $new_game->Game_preview = 'img/' . $imageName;
        }
        else {
            // Set a default image or keep it null if no image is provided
            $new_game->Game_preview = null;  // or a default image path if needed
        }

        if ($request->hasFile('g_bg') && $request->file('g_bg')->isValid()) {
            $bgName = time() . '.' . $request->g_bg->extension();
            $request->g_bg->move(public_path('img_bg'), $bgName);
            $new_game->Gamebackground = 'img_bg/' . $bgName;
            }
    else {
            $new_game->Gamebackground   = null;
        }
    
        // Assign download link
        $new_game->Game_dowload_link = $request->g_link;
       

        // Syn user id auth who created the game
        $new_game->user_id = $request->huser_id;
        $new_game->save();

            // Convert tags from string to array
            $tags = explode(',', $request->g_tags);
            $cleanTags = array_map(function($tag) {
                return trim(str_replace(['[', ']', '"'], '', $tag));}, $tags);
            $tagIds = [];
            foreach ($cleanTags as $tagName) {
                $gametag = gametag::firstOrCreate(['gametag_name' => $tagName]);
                $tagIds[] = $gametag->idgametag;
            }
        
            // Sync tags with the game
            $new_game->gametags()->sync($tagIds);

            // Handle multiple screenshots
            if($request->hasFile('screenshots')){
                foreach ($request->file('screenshots') as $screenshot) {
                    $screenshotName = time() . rand(1, 1000) . '.' . $screenshot->extension();
                    $screenshot->move(public_path('imgscreenshot'), $screenshotName);

                // Save screenshot path to the database
                screenshot::create([
                'idgames' => $new_game->idgames,
                'image_path' => 'imgscreenshot/' . $screenshotName]);}}


        return redirect('/Devmanage');
    }

    

    public function update(Request $request, $idgames) {
        $game = game::findOrFail($idgames);
        
    
        // Validate the form data
        $request->validate([
            'g_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:20048',
            'g_bg' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:20048' // Validate file type and size
        ]);
    
        // Update game fields
        $game->Game_name = $request->g_name;
        $game->Game_info = $request->g_details;
        $game->version = $request->g_version;
        $game->Status = $request->g_status;
    
        // Handle image upload
        if ($request->hasFile('g_img') && $request->file('g_img')->isValid()) {
            $imageName = time() . '.' . $request->g_img->extension();
            $request->g_img->move(public_path('img'), $imageName);
            $game->Game_preview = 'img/' . $imageName;
        }

        
        if ($request->hasFile('g_bg') && $request->file('g_bg')->isValid()) {
            $bgName = time() . '.' . $request->g_bg->extension();
            $request->g_bg->move(public_path('img_bg'), $bgName);
            $game->Gamebackground = 'img_bg/' . $bgName; // Use $game instead of $new_game
        }
        
        $game->Game_dowload_link = $request->g_link;
       
        $game->save();
    
        $devlogs =  new developer_log;
        $devlogs->idgames = $game->idgames;
        $devlogs->user_id =  $request->huser_id;
        $devlogs->topic = $request->devtopic;
        $devlogs->detail = $request->devdetail;
        $devlogs->version = $request->g_version;
        $devlogs->save();



        // Handle tags
        // First, detach all existing tags
        $game->gametags()->detach();
    
        // Process and attach new tags
        $tags = explode(',', $request->g_tags);
        $cleanTags = array_map(function($tag) {
            return trim(str_replace(['[', ']', '"'], '', $tag));}, $tags);
        $tagIds = [];
        foreach ($cleanTags as $tagName) {
            $gametag = gametag::firstOrCreate(['gametag_name' => trim($tagName)]);
            $tagIds[] = $gametag->idgametag;
        }
    
        // Sync the updated tags
        $game->gametags()->sync($tagIds);
    
        // Handle multiple screenshots
        // First, delete old screenshots
        $existingScreenshots = screenshot::where('idgames', $game->idgames) ->get();
        foreach ($existingScreenshots as $screenshot) {
            // Delete the file from the public folder
            $imagePath = public_path($screenshot->image_path);
            if (file_exists($imagePath)) {
                unlink($imagePath);  // Delete the file from the directory
            }
            // Delete the screenshot from the database
            $screenshot->delete();
        }
    
        // Now, handle new screenshots
        if($request->hasFile('screenshots')){
            foreach ($request->file('screenshots') as $screenshot) {
                $screenshotName = time() . rand(1, 1000) . '.' . $screenshot->extension();
                $screenshot->move(public_path('imgscreenshot'), $screenshotName);
    
                // Save screenshot path to the database
                screenshot::create([
                    'idgames' => $game->idgames,
                    'image_path' => 'imgscreenshot/' . $screenshotName
                ]);
            }
        }

        return redirect('/Devmanage');
    }
    


    public function delete($idgames){
        $games = game::destroy($idgames);
        return redirect('/home');
    }
    
    // public function serch(Request $request){
    //     $games = game::where($request ->g_serch)->get();
    //     return view('/dashboard', compact('games'));
    // }
}
