<div>
    @if($isInWishlist)
        <button wire:click="toggleWishlist" class="bg-red-500 text-white p-2 rounded">Remove from Wishlist</button>
    @else
        <button wire:click="toggleWishlist" class="bg-blue-500 text-white p-2 rounded">Add to Wishlist</button>
    @endif
</div>
