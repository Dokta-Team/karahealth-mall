<?php

namespace App\Livewire\User;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;
use App\Models\Profession as ModelsProfession;

class Professions extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $confirmingId;
    public $category;

    protected $listeners = [
        'dismiss' => 'dismiss', // Event name => method name
        'delete' => 'delete',
    ];


    public function mount($category){
        $this->category = $category;
    }


    public function render()
    {

        $query = ModelsProfession::where('sub_category_id', $this->category->id);
        
        if (Auth::user()->role->name !== 'admin') {
            $query->where('user_id', Auth::user()->id);
        }
        
        $professions = $query->orderBy('id','DESC')->paginate(10);
        
        return view('livewire.user.professions', compact('professions'));
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

        ModelsProfession::find($this->confirmingId)->delete();
        
        $this->dispatch('show-toast', ['message' => 'Profession deleted successfully.']);

    }
}
