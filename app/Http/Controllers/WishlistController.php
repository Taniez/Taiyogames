<?php

namespace App\Http\Controllers;

use App\Models\game;
use Illuminate\Http\Request;
use App\Models\gametype;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = auth()->user()->wishlists()->with('game')->get(); 
        $tags = gametype::all();
       
        return view('wishlist', compact('wishlists','tags'));
        
       
       
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

    public function favsearch(Request $request) {
       
        $tags = gametype::all();
        $request->validate([
            'search_box' => 'nullable|string|max:255',
        ]); 
     
        $wishlists = auth()->user()->wishlists()->whereHas('game', function($query) use ($request) {
            $query->where('Game_name', 'LIKE', "%{$request->serch_box}%");
        })->with('game')->get();
        
        return view("wishlist", compact('wishlists','tags'));
    }
    
   



    public function favsearchByTag($tag)
    {
        
        $tags = gametype::all();
        // Find the tag in the 'gametypes' table
        $gametype = gametype::where('gametype_name', $tag)->first();
    $wishlists = auth()->user()->wishlists()->with('game')->get(); 
        if ($gametype) {
            // Get games associated with this tag
            $wishlists = $gametype->games()->get();
        } else {
            // If tag doesn't exist, return an empty result or a message
            $wishlists = collect();  // Empty collection
        }

        // Return the view with the filtered games
        return view('wishlist', compact('wishlists','tags'));
    }
}
