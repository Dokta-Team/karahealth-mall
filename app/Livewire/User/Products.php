<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Product as ProductModel;

class Products extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';


    public $confirmingId;

    protected $listeners = [
        'dismiss' => 'dismiss', // Event name => method name
        'delete' => 'delete',
    ];

    public function render()
    {
        $products = Auth::user()->role->name == 'admin' 
        ? ProductModel::orderBy('id','DESC')->paginate(10)
        : ProductModel::where('user_id', Auth::id())->orderBy('id','DESC')->paginate(10);

        return view('livewire.user.products', compact('products'));
    }

    public function confirmDelete($id)
    {
        $this->confirmingId = $id;
        $this->dispatch('show-delete-modal');
    }

    public function dismiss()
    {
        $this->confirmingId = '';
    }
}
