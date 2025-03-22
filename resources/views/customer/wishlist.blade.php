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
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Wishlist</li>
                    </ol>
                </nav>
            </div>
            <div class="order-md-1 text-center text-md-left col-lg col-12">
                <h1 class="h3 mb-0">Wishlist</h1>
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
                    <div class="d-none d-md-block">
                        <div class="row mb-md-5">
                            <div class="col">
                                <h5 class="mb-1 text-white">Wishlist</h5>
                                <p class="mb-0 text-white small">
                                    Browse and manage your wishlist items here.
                                </p>
                            </div>
                            <div class="col-auto">
                                <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm"> <i class="ti-angle-left"></i> Go Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">

                            @livewire('customer.wishlist')

                            {{-- <div class="cart_product border-0">
                                <div class="cart_item px-0">
                                    <div class="cart_item_image">
                                        <img src="{{ asset('assets/img/product/product-1.png') }}" alt="shop">
                                    </div>
                                    <div class="c-item-body">
                                        <div class="cart_item_title mb-2">
                                            <h4>1mg Salmon Omega 3 Fish Oil Capsule</h4>
                                            <p class="small mb-0 text-muted">bottle of 60 capsules</p>
                                        </div>
                                        <div class="cart_item_price">
                                            <div class="product-price">
                                                <span>
                                                    <strong>$499 </strong>
                                                    <del>$1,000</del>
                                                    <small class="product-discountPercentage">(50% OFF)</small>
                                                </span>
                                            </div>
                                            <div class="cart_product_remove">
                                                <a href="#">
                                                    <i class="ti-trash"></i> Remove</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                              
                            </div> --}}

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection