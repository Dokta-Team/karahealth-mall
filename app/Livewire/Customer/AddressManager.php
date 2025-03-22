<?php

namespace App\Livewire\Customer;

use App\Models\Address;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class AddressManager extends Component
{
    public $addresses;
    public $showForm = false;
    public $address_id, $name, $phone, $address, $apt, $city, $state, $zip_code, $country;

    protected $rules = [
        'name' => 'required|string|max:255',
        'phone' => 'required|string|max:20',
        'address' => 'required|string|max:255',
        'apt' => 'nullable|string|max:255',
        'city' => 'required|string|max:255',
        'state' => 'required|string|max:255',
        'zip_code' => 'required|string|max:20',
        'country' => 'required|string|max:255',
    ];

    public function mount()
    {
        $this->addresses = Address::where('user_id', Auth::id())->get();
    }

    public function toggleForm($addressId = null)
    {
        $this->resetForm();
        $this->showForm = !$this->showForm;

        if ($addressId) {
            $address = Address::findOrFail($addressId);
            $this->address_id = $address->id;
            $this->name = $address->name;
            $this->phone = $address->phone;
            $this->address = $address->address;
            $this->apt = $address->apt;
            $this->city = $address->city;
            $this->state = $address->state;
            $this->zip_code = $address->zip_code;
            $this->country = $address->country;
        }
    }

    public function saveAddress()
    {
        $this->validate();

        Address::updateOrCreate(
            ['id' => $this->address_id, 'user_id' => Auth::id()],
            [
                'name' => $this->name,
                'phone' => $this->phone,
                'address' => $this->address,
                'apt' => $this->apt,
                'city' => $this->city,
                'state' => $this->state,
                'zip_code' => $this->zip_code,
                'country' => $this->country,
            ]
        );

        session()->flash('success', 'Address saved successfully.');
        
        $this->resetForm();
        $this->addresses = Address::where('user_id', Auth::id())->get();
        $this->showForm = false;
    }

    public function deleteAddress($id)
    {
        Address::findOrFail($id)->delete();
        $this->addresses = Address::where('user_id', Auth::id())->get();
        session()->flash('error', 'Address deleted successfully.');
    }

    public function resetForm()
    {
        $this->address_id = null;
        $this->name = '';
        $this->phone = '';
        $this->address = '';
        $this->apt = '';
        $this->city = '';
        $this->state = '';
        $this->zip_code = '';
        $this->country = '';
    }


    
    public function render()
    {
        return view('livewire.customer.address-manager');
    }
}
