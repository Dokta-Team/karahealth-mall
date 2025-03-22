<?php

namespace App\Livewire;

use App\Models\Cart as ModelCart;
use App\Models\Address;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Cart extends Component
{

    public $cartItems = [];
    public $addresses = [];
    public $selectedAddress;
    public $totalCartPrice = 0;
    public $shiping_cost = 0;

    public $grandCartPrice = 0;

    
    public function mount()
    {
        $this->loadCart();
        $this->loadAddresses();
    }


    public function loadCart()
    {
        // Load cart items with associated products
        $this->cartItems = ModelCart::where('status', 'cart')->where('user_id', Auth::id())->with('product')->get();

            // Calculate the total price of all cart items
            $this->totalCartPrice = $this->cartItems->sum(function ($cartItem) {
                // Ensure the product relationship exists and has a price
                if ($cartItem->product) {
                    return $cartItem->product->price * $cartItem->count; // Use 'count' for quantity
                }
                return 0; // If the product is missing, return 0 for this item
            });
        
        $this->grandCartPrice = $this->totalCartPrice+$this->shiping_cost;

    }

    public function loadAddresses()
    {
        $this->addresses = Address::where('user_id', Auth::id())->get();
    }

    public function updateQuantity($cartId, $count)
    {
        $cart = ModelCart::find($cartId);
        if ($cart) {
            $cart->update(['count' => $count]);
            session()->flash('success', 'Cart updated successfully.');
        }
        $this->loadCart();
    }

    public function removeFromCart($cartId)
    {
        ModelCart::where('id', $cartId)->where('user_id', Auth::id())->delete();
        session()->flash('success', 'Product removed from cart!');
        $this->loadCart();
    }

    public function placeOrder()
    {
        foreach ($this->cartItems as $item) {
            $item->status = 'Order placed';
            $item->total = $this->grandCartPrice;

            $item->purchased_date = now();
            $item->save();
        }
        $this->loadCart();

        session()->flash('success', 'Order is placed.');
    }

    
    public function render()
    {
        return view('livewire.cart');
    }
}
