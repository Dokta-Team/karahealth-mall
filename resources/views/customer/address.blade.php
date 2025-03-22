@extends('layouts.app')

@section('content')
<div class="accounnt_header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-auto col-12 order-md-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a class="text-nowrap" href="{{ route('customer.orders') }}"><i class="fa fa-home mr-2"></i>Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a class="text-nowrap" href="{{ route('customer.account') }}"><i class="fa fa-home mr-2"></i>Account</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Address</li>
                    </ol>
                </nav>
            </div>
            <div class="order-md-1 text-center text-md-left col-lg col-12">
                <h1 class="h3 mb-0">Address</h1>
            </div>
        </div>
    </div>
</div>
<div class="accounnt_body">
    <div class="container">
        <div class="row">
            @include('customer.sidebar')
            <div class="col-lg-9 col-md-9 col-12">
                <div class="ml-0 ml-md-4">
                    {{-- <div class="d-none d-md-block">
                        <div class="row mb-md-5">
                            <div class="col">
                                <h5 class="mb-1 text-white">Account Overview</h5>
                                <p class="mb-0 text-white small">
                                    You have full control to manage your own account setting.
                                </p>
                            </div>
                            <div class="col-auto">
                                
                                <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm"> <i class="ti-angle-left"></i> Go Back</a>
                                <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#address_model" class="btn btn-primary btn-sm"> Add New
                                    Address</a>
                                    <div class="modal clean_modal clean_modal-lg" id="address_model" tabindex="-1" aria-labelledby="address_model" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <div class="modal-body">
                                                    <form action="" id="address_modal_form" method="POST">
                                                        <div class="form-group">
                                                            <input name="name" required="" type="text" placeholder="Address Name" class="form-control input-lg rounded">
                                                        </div>
                                                        <div class="form-group">
                                                            <input name="phone" required="" type="text" placeholder="Phone Number" class="form-control input-lg rounded">
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-lg-6 form-group">
                                                      
                                                                    <input type="text" required=""  placeholder="Address" class="form-control input-lg rounded" name="address" id="address">
                                                            </div>
                                                            <div class="col-lg-6 form-group">
                                                             
                                                                    <input type="text" placeholder="Apt / Suite / Floor" class="form-control input-lg rounded" name="apt" id="apt">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 form-group">
                                                       
                                                                    <input type="text" placeholder="City" required="" class="form-control input-lg rounded" name="city" id="locality">
                                                            </div>
                                                            <div class="col-md-6 form-group">
                                                               
                                                                    <input type="text" placeholder="State" required="" class="form-control input-lg rounded" name="state" id="administrative_area_level_1">
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6 form-group">
                                                              
                                                                    <input type="text" placeholder="ZIP code" required="" class="form-control input-lg rounded" name="zip_code" id="postal_code">
                                                            </div>
                                                            <div class="col-lg-6 form-group">
                                                               
                                                                    <input type="text" placeholder="Country" required="" class="form-control input-lg rounded" name="country" id="country">
                                                            </div>
                                                        </div>
                                                        <button type="submit" id="address_btn" name="submit" class="btn btn-primary btn-full btn-medium rounded">Add Address</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="address-block bg-light rounded p-3">
                                        <a href="" class="edit_address" data-toggle="modal" data-dismiss="modal" data-target="#address_model">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <a href="" class="delete_address">
                                            <i class="fa fa-trash text-danger" aria-hidden="true"></i>
                                        </a>
                                        <h6>My Home Address</h6>
                                        <p class="text-muted">1234567890</p>
                                        <span class="text-muted">Chayan para, pal para, Ghogomali, Siliguri,
                                            West Bengal - 734006</span>
                                    </div>
                                </div>
                                <div class="col-lg-6"></div>
                            </div>
                        </div>
                    </div> --}}

                    @livewire('customer.address-manager')
                </div>
            </div>
        </div>
    </div>
</div>



@endsection