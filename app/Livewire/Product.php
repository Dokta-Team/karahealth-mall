<?php

namespace App\Livewire;

use App\Models\Cart;
use Livewire\Component;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use App\Models\Product as ModelsProduct;

class Product extends Component
{
    public $product;
    public $related;


    public $count = 1;
    public $varients = 1;


    public function addToWishlist()
    {
        if (!Auth::check()) {
            session()->flash('error', 'You must be logged in to add to wishlist.');
            return;
        }

        Wishlist::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $this->product->id,
        ], []);

        session()->flash('success', 'Product added to wishlist!');
    }

    public function addToCart()
    {
        if (!Auth::check()) {
            session()->flash('error', 'You must be logged in to add to cart.');
            return;
        }

        Cart::firstOrCreate([
            'user_id' => Auth::id(),
            'product_id' => $this->product->id,
            'count' => $this->count,
            'product_variant_id' => $this->varients,

        ], []);

        session()->flash('success', 'Product added to cart!');
    }
    

    public function mount($product)
    {
        $this->product = $product;

        $this->related = ModelsProduct::where('category_id', $this->product->category_id)->get();

    }
    
    public function render()
    {
        return view('livewire.product');
    }
}
