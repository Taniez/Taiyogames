<div>
    @if($isInWishlist)
        <button wire:click="toggleWishlist" ><i class="bi bi-heart-fill" style="color: red;"></i></button>
    @else
        <button wire:click="toggleWishlist" >  <i class="bi bi-heart" style="color: red;"></i></button>
    @endif
</div>
