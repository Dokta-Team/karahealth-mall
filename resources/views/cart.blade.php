@extends('layouts.app')

@section('content')

<section class="section-padding mt-5">
    <div class="container">
            {{-- <div class="col-md-9">
                <div class="cart_product">
                    <div class="cart_product_heading">
                        <div class="row align-items-center">
                            <div class="col-sm-6 text-lg-left">
                                <h4>Shopping Cart
                                    <span>( 3 Item )</span>
                                </h4>
                            </div>
                            <div class="col-sm-6 text-lg-right">
                                <a href="#" class="btn btn-light btn-medium button-sm d-none d-md-inline-block"><i class="ti-trash"></i> Empty
                                    Cart</a>
                            </div>
                        </div>
                    </div>

                    <div class="cart_item">
                        <div class="cart_item_image">
                            <img src="assets/img/product/product-1.png" alt="shop">
                        </div>
                        <div class="c-item-body mt-4 mt-md-0">
                            <div class="cart_item_title mb-2">
                                <h4>1mg Salmon Omega 3 Fish Oil Capsule</h4>
                                <p class="small mb-0 text-muted">bottle of 60 capsules</p>
                            </div>
                            <div class="cart_item_price">
                                <div class="product-price">
                                    <span>
                                        <strong>₹499 </strong>
                                        <del>₹1,000</del>
                                        <small class="product-discountPercentage">(50% OFF)</small>
                                    </span>
                                </div>
                                <div class="cart_product_remove">
                                    <a href="#">
                                        <i class="ti-trash"></i> Remove</a>
                                </div>
                            </div>
                        </div>
                        <div class="qty-input btn mt-4 mt-md-0">
                            <i class="less">-</i>
                            <input type="text" value="2">
                            <i class="more">+</i>
                        </div>
                    </div>
                   
                </div>
            </div>
            <div class="col-lg-3 mt-lg-0 mt-6">
                <h6 class="font-weight-bold">Deliver to</h6>
                <div class="mb-4">
                    <select class="form-control">
                        <option value="s">Siliguri - 734001</option>
                        <option value="s" selected="">Delhi - 110002</option>
                        <option value="s">Kolkata - 700027</option>
                    </select>
                </div>
                <div class="cart-summary">
                    <div class="cart-summary-wrap">
                        <h4>Cart Summary</h4>
                        <p>Sub Total <span>$1250.00</span></p>
                        <p>Shipping Cost <span>$00.00</span></p>
                        <h2>Grand Total <span>$1250.00</span></h2>
                    </div>
                    <p class="py-4">We accept following credit cards:&nbsp;&nbsp;<img class="d-inline-block align-middle" src="assets/img/payment-methods.png" style="width: 187px;" alt="Cerdit Cards"></p>
                    <div class="cart-summary-button">
                        <a href="{{ route('checkout') }}" class="btn btn-primary btn-rounded btn-full btn-large">Proceed to Payment <i class="ti-arrow-right"></i> </a>
                    </div>
                </div>
            </div> --}}

            @livewire('cart')
    </div>
</section>

@endsection
