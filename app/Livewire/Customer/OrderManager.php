<?php

namespace App\Livewire\Customer;

use App\Models\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class OrderManager extends Component
{
    public $orders;

    public function mount()
    {
        $this->orders = Cart::where('user_id', Auth::id())
            ->where('status', '!=', 'cart')
            ->orderBy('purchased_date', 'desc')
            ->get();
    }


    public function render()
    {
        return view('livewire.customer.order-manager');
    }
}
