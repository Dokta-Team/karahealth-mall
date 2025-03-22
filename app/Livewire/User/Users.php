<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $tab = 'customer';

    protected $queryString = [
        'tab',
    ];

    
    public function activeTab($tab)
    {
        $this->tab = $tab;
    }

    public function render()
    {
        // $users = User::orderBy('id', 'DESC')->orderBy('id','DESC')->paginate(10);

        $users = User::query();

        if ($this->tab === 'customer') {
            $users->where('role_id', 4);
        } elseif ($this->tab === 'profession') {
            $users->where('role_id', 3);
        } elseif ($this->tab === 'vendor') {
            $users->where('role_id', 2);
        } elseif ($this->tab === 'admin') {
            $users->where('role_id', 1);
        }

        if ($this->tab === 'deactive') {
            $users->where('status', 0);
        }

        $users = $users->orderBy('id', 'DESC')->paginate(10);


        return view('livewire.user.users', compact('users'));
    }
}
