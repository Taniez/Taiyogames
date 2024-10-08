<?php

namespace App\Http\Controllers;

use App\Models\game;
use Illuminate\Http\Request;
use App\Models\gametag;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = auth()->user()->wishlists()->with('game')->get(); 
        $tags = gametag::all();
        $_Games = game::with('gametags')->get();
        return view('wishlist', compact('wishlists','tags', '_Games'));
        
       
       
    }
    public function store(Request $request)
    {
        $request->validate([
            'idgames' => 'required|exists:games,idgames',
        ]);

        auth()->user()->wishlists()->create([
            'idgames' => $request->idgames,
        ]);

        return back()->with('success', 'game added to wishlist!');
    }

    public function destroy($id)
    {
        $wishlist = auth()->user()->wishlists()->findOrFail($id);
        $wishlist->delete();

        return back()->with('success', 'game removed from wishlist!');

    }


    
    public function serch(Request $request) {
        $tags = gametag::all();
        $request->validate([
            'search_box' => 'nullable|string|max:255',
        ]);
        $_Games = game::where("Game_name","LIKE","%$request->serch_box%")->get(); // ดึงข้อมูลเกมทั้งหมดจากฐานข้อมูล
        return view("wishlist", compact('_Games','tags'));
    }



    public function searchByTag($tag)
    {
        $tags = gametag::all();

        $gametag = gametag::where('gametag_name', $tag)->first();

        if ($gametag) {
            // Get games associated with this tag
            $_Games = $gametag->games()->get();
        } else {
            // If tag doesn't exist, return an empty result or a message
            $_Games = collect();  // Empty collection
        }

        // Return the view with the filtered games
        return view('wishlist', compact('_Games','tags'));
    }
}
