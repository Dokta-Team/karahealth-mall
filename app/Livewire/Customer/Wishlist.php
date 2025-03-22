<?php

namespace App\Livewire\Customer;

use Livewire\Component;
use App\Models\Wishlist as ModelWishlist;
use Illuminate\Support\Facades\Auth;

class Wishlist extends Component
{
    public $wishlistItems = [];

    public function mount()
    {
        $this->loadWishlist();
    }

    public function loadWishlist()
    {
        $this->wishlistItems = ModelWishlist::where('user_id', Auth::id())->with('product')->get();
    }

    public function removeFromWishlist($wishlistId)
    {
        ModelWishlist::where('id', $wishlistId)->where('user_id', Auth::id())->delete();
        session()->flash('success', 'Product removed from wishlist!');
        $this->loadWishlist();
    }

    public function render()
    {
        return view('livewire.customer.wishlist');
    }
}
