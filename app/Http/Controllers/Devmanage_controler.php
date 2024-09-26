<?php

namespace App\Http\Controllers;
use App\Models\screenshot;
use Illuminate\Http\Request;
use App\Models\gametype;
use App\Models\game;
class Devmanage_controler extends Controller
{
    public function index(){
        $games = game::all();
        return view('Devmanage', compact('games'));
     }
    //
    public function create(Request $request){
        $request->validate([
            'g_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate file type and size
        ]);
       
        $new_game = new game;
    
        // Assign other request values
        $new_game->Game_name = $request->g_name;
        $new_game->Game_info = $request->g_details;
        $new_game->version = $request->g_version;
    
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
    
        // Assign download link
        $new_game->Game_dowload_link = $request->g_link;
        $new_game->Gamevideo = $request->g_video;
        $new_game->save();

            // Convert tags from string to array
            $tags = explode(',', $request->g_tags);
            $cleanTags = array_map(function($tag) {
                return trim(str_replace(['[', ']', '"'], '', $tag));}, $tags);
            $tagIds = [];
            foreach ($cleanTags as $tagName) {
                $gametype = gametype::firstOrCreate(['gametype_name' => $tagName]);
                $tagIds[] = $gametype->idgametypes;
            }
        
            // Sync tags with the game
            $new_game->gametypes()->sync($tagIds);

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
            'g_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validate file type and size
        ]);
    
        // Update game fields
        $game->Game_name = $request->g_name;
        $game->Game_info = $request->g_details;
        $game->version = $request->g_version;
    
        // Handle image upload
        if ($request->hasFile('g_img') && $request->file('g_img')->isValid()) {
            $imageName = time() . '.' . $request->g_img->extension();
            $request->g_img->move(public_path('img'), $imageName);
            $game->Game_preview = 'img/' . $imageName;
        }
    
        $game->Game_dowload_link = $request->g_link;
        $new_game->Gamevideo = $request->g_video;
        $game->save();
    
        // Handle tags
        $tags = explode(',', $request->g_tags);
        $cleanTags = array_map(function($tag) {
            return trim(str_replace(['[', ']', '"'], '', $tag));}, $tags);
        $tagIds = [];
        foreach ($cleanTags as $tagName) {
            $gametype = gametype::firstOrCreate(['gametype_name' => trim($tagName)]);
            $tagIds[] = $gametype->idgametypes;
        }
    
        // Sync the updated tags
        $game->gametypes()->sync($tagIds);

         // Handle multiple screenshots
        if($request->hasFile('screenshots')){
            foreach ($request->file('screenshots') as $screenshot) {
                $screenshotName = time() . rand(1, 1000) . '.' . $screenshot->extension();
                $screenshot->move(public_path('imgscreenshot'), $screenshotName);

            // Save screenshot path to the database
            screenshot::create([
                'idgames' => $game->idgames,
                'image_path' => 'imgscreenshot/' . $screenshotName]);}}
    
        return redirect('/Devmanage');
    }


    public function delete($idgames){
        $games = game::destroy($idgames);
        return redirect('/Devmanage');
    }
    
    // public function serch(Request $request){
    //     $games = game::where($request ->g_serch)->get();
    //     return view('/dashboard', compact('games'));
    // }
}
