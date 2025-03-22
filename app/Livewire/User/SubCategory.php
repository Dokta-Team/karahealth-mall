<?php

namespace App\Livewire\User;

use App\Models\SubCategory as ModelsSubCategory;
use Livewire\Component;

class SubCategory extends Component
{
    public $confirmingId;
    public $sub_category_id;

    protected $listeners = [
        'dismiss' => 'dismiss', // Event name => method name
        'delete' => 'delete',
    ];

    public function mount($id)
    {
        $this->sub_category_id = $id;
    }

    public function render()
    {
        $sub_categories = ModelsSubCategory::where('category_id', $this->sub_category_id)->get();

        return view('livewire.user.sub-category', compact('sub_categories'));
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

        $sub_category = ModelsSubCategory::find($this->confirmingId)->delete();
        
        $this->dispatch('show-toast', ['message' => 'Sub Category deleted successfully.']);

    }
}
