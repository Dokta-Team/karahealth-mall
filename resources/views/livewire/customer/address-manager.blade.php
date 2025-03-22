<div>
    <div class="d-none d-md-block">
        <div class="row mb-md-5">
            <div class="col">
                <h5 class="mb-1 text-white">Account Overview</h5>
                <p class="mb-0 text-white small">
                    You have full control to manage your own account setting.
                </p>
            </div>
            <div class="col-auto">
                
                <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm"> <i class="ti-angle-left"></i> Go Back</a>
                @if(!$showForm)
                    <button wire:click="toggleForm" class="btn btn-primary btn-sm">
                        Add New Address
                    </button>
                @endif

                   
            </div>
        </div>
    </div>

    @if ($showForm)
    <div class="card p-4 mb-4">
        <h5 class="mb-3">{{ $address_id ? 'Edit Address' : 'Add New Address' }}</h5>
        <form wire:submit.prevent="saveAddress">
            <div class="form-group">
                <input wire:model="name" type="text" placeholder="Address Name" class="form-control">
                @error('name') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <input wire:model="phone" type="text" placeholder="Phone Number" class="form-control">
                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <input wire:model="address" type="text" placeholder="Address" class="form-control">
                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <input wire:model="apt" type="text" placeholder="Apt / Suite / Floor" class="form-control">
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <input wire:model="city" type="text" placeholder="City" class="form-control">
                    @error('city') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6 form-group">
                    <input wire:model="state" type="text" placeholder="State" class="form-control">
                    @error('state') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 form-group">
                    <input wire:model="zip_code" type="text" placeholder="ZIP code" class="form-control">
                    @error('zip_code') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
                <div class="col-md-6 form-group">
                    <input wire:model="country" type="text" placeholder="Country" class="form-control">
                    @error('country') <span class="text-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                {{ $address_id ? 'Update Address' : 'Save Address' }}
            </button>
            <button type="button" wire:click="toggleForm" class="btn btn-danger">
                Remove
            </button>
        </form>
    </div>
@endif

    <div class="card">
        <div class="card-body">
            <div class="row">
                @foreach ($addresses as $address)

                <div class="col-lg-6">
                    <div class="address-block bg-light rounded p-3">
                        <a href="javascript:;" class="edit_address" wire:click="toggleForm({{ $address->id }})">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                        </a>
                        <a href="javascript:;" class="delete_address" wire:click="deleteAddress({{ $address->id }})">
                            <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                        </a>
                        <h6>{{ $address->name }}</h6>
                        <p class="text-muted">{{ $address->phone }}</p>
                        <span class="text-muted">
                            {{ $address->address }},
                    @if ($address->apt) {{ $address->apt }}, @endif
                    {{ $address->city }}, {{ $address->state }} - {{ $address->zip_code }},
                    {{ $address->country }}
                        </span>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div> 



    <!-- Address Modal -->
    <div class="modal fade" id="address_model" tabindex="-1" aria-labelledby="address_model" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{ $address_id ? 'Edit Address' : 'Add Address' }}</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form wire:submit.prevent="{{ $address_id ? 'updateAddress' : 'addAddress' }}">
                        <div class="row">
                            <div class="col-lg-12 form-group">
                      
                        <input type="text" wire:model="name" class="form-control " placeholder="Address Name">

                    </div>
                
                            <div class="col-lg-12 form-group">
                      
                        <input type="text" wire:model="phone" class="form-control " placeholder="Phone Number">
                    </div>
                
                            <div class="col-lg-12 form-group">
                        <input type="text" wire:model="address" class="form-control " placeholder="Address">
                    </div>
                
                            <div class="col-lg-6 form-group">
                        <input type="text" wire:model="apt" class="form-control " placeholder="Apt / Suite / Floor">
                    </div>
                
                            <div class="col-lg-6 form-group">
                        <input type="text" wire:model="city" class="form-control " placeholder="City">
                    </div>
                
                            <div class="col-lg-6 form-group">
                        <input type="text" wire:model="state" class="form-control " placeholder="State">
                    </div>
                
                            <div class="col-lg-6 form-group">
                        <input type="text" wire:model="zip_code" class="form-control " placeholder="ZIP Code">
                    </div>
                
                            <div class="col-lg-6 form-group">
                        <input type="text" wire:model="country" class="form-control " placeholder="Country">
                    </div>
                
                            <div class="col-lg-12 form-group">
                        <button type="submit" class="btn btn-primary btn-block">{{ $address_id ? 'Update' : 'Add' }} Address</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
