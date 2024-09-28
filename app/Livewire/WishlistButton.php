<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class WishlistButton extends Component
{
    public $gameId;
    public $isInWishlist;

    public function mount($gameId)
    {
        $this->gameId = $gameId;
        $this->isInWishlist = Auth::user()->wishlists()->where('idgames', $gameId)->exists();
    }

    public function toggleWishlist()
    {
        if ($this->isInWishlist) {
            // Remove from Wishlist
            Wishlist::where('user_id', Auth::id())->where('idgames', $this->gameId)->delete();
            $this->isInWishlist = false;
        } else {
            // Add to Wishlist
            Auth::user()->wishlists()->create([
                'idgames' => $this->gameId,
            ]);
            $this->isInWishlist = true;
        }
    }

    public function render()
    {
        return view('livewire.wishlist-button');
    }
}
