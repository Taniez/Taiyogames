<?php

namespace App\Http\Controllers;

use App\Models\game;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = auth()->user()->wishlists()->with('game')->get(); 
        
        return view('wishlist', compact('wishlists'));
        
       
       
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
}
