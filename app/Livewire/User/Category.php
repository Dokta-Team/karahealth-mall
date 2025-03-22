<?php

namespace App\Livewire\User;

use App\Models\Category as ModelsCategory;
use Livewire\Component;

class Category extends Component
{
    public $confirmingId;

    protected $listeners = [
        'dismiss' => 'dismiss', // Event name => method name
        'delete' => 'delete',
    ];

    public function render()
    {
        $categories = ModelsCategory::get();
        return view('livewire.user.category', compact('categories'));
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

    public function delete()
    {

        $category = ModelsCategory::find($this->confirmingId)->delete();
        
        $this->dispatch('show-toast', ['message' => 'Category deleted successfully.']);

    }
}
