<div>
    <div class="row justify-content-between">

    @if(session()->has('success'))
        <div class="alert alert-success">
            <strong class="text-success">{{ session('success') }}</strong>
        </div>
    @endif

    <div class="col-md-9">
        <div class="cart_product">
            <div class="cart_product_heading">
                <div class="row align-items-center">
                    <div class="col-sm-6 text-lg-left">
                        <h4>Shopping Cart <span>({{ count($cartItems) }} Items)</span></h4>
                    </div>
                    
                </div>
            </div>

            @foreach ($cartItems as $item)
                <div class="cart_item">
                    <div class="cart_item_image">
                        <img src="{{ asset('uploads/products/' . $item->product->thumbnail) }}" alt="item">
                    </div>
                    <div class="c-item-body mt-4 mt-md-0">
                        <div class="cart_item_title mb-1">
                            <h4>{{ $item->product->name }}</h4>
                            @if ($item->productVariant)

                            <p class="small mb-0 text-muted">
                                {{ $item->productVariant->name }}
                            </p>
                            @endif

                        </div>
                        <div class="cart_item_price">
                            <div class="product-price">
                                <span>
                                    <strong>${{ $item->product->price }}</strong>
                                    @if ($item->product->before_discount_price)
                                        <del>${{ $item->product->before_discount_price }}</del>
                                        <small class="product-discountPercentage">
                                            ({{ round(100 - ($item->product->price / $item->product->before_discount_price) * 100) }}% OFF)
                                        </small>
                                    @endif
                                </span>
                            </div>
                            <div class="cart_product_remove">
                                <a  wire:click="removeFromCart({{ $item->id }})" style="cursor: pointer;">
                                    <i class="ti-trash"></i> Remove
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="qty-input btn mt-4 mt-md-0">
                        <i class="less" wire:click="updateQuantity({{ $item->id }}, {{ $item->count - 1 }})">-</i>
                        <input type="text" value="{{ $item->count }}">
                        <i class="more" wire:click="updateQuantity({{ $item->id }}, {{ $item->count + 1 }})">+</i>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="col-lg-3 mt-lg-0 mt-6">
        <h6 class="font-weight-bold">Deliver to</h6>
        <div class="mb-4">
            <select class="form-control" wire:model="address">
                @foreach ($addresses as $address)
                    <option value="{{ $address->id }}">{{ $address->address }}</option>
                @endforeach
            </select>
        </div>
        <div class="cart-summary">
            <div class="cart-summary-wrap">
                <h4>Cart Summary</h4>
                <p>Sub Total <span>${{ $totalCartPrice }}</span></p>
                <p>Shipping Cost <span>${{ $shiping_cost }}</span></p>
                <h2>Grand Total <span>${{ $grandCartPrice }}</span></h2>
            </div>
            <p class="py-4">We accept following credit cards:&nbsp;&nbsp;<img class="d-inline-block align-middle" src="assets/img/payment-methods.png" style="width: 187px;" alt="Cerdit Cards"></p>
            <div class="cart-summary-button">
                <a href="javascript:;" wire:click="placeOrder" class="btn btn-primary btn-rounded btn-full btn-large">Place Order <i class="ti-arrow-right"></i> </a>
            </div>
        </div>
    </div> 

    {{-- <div class="col-lg-3 mt-lg-0 mt-6">
        <h6 class="font-weight-bold">Deliver to</h6>
        <div class="mb-4">
            <select class="form-control">
                @foreach ($addresses as $address)
                    <option value="{{ $address->id }}">{{ $address->address }}</option>
                @endforeach
            </select>
        </div>
        <div class="cart-summary">
            <h4>Cart Summary</h4>
            <p>Sub Total <span>$1250.00</span></p>
            <p>Shipping Cost <span>$00.00</span></p>
            <h2>Grand Total <span>$1250.00</span></h2>
        </div>
        <div class="cart-summary-button">
            <a href="{{ route('checkout') }}" class="btn btn-primary btn-rounded btn-full btn-large">Proceed to Payment <i class="ti-arrow-right"></i> </a>
        </div>
    </div> --}}
</div>

</div>
