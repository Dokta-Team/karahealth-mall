<div>
    @if(session()->has('success'))
        <div class="alert alert-success">
            <strong class="text-success">{{ session('success') }}</strong>
        </div>
    @endif

    @foreach ($wishlistItems as $item)
        <div class="cart_product border-0">
            <div class="cart_item px-0">
                <div class="cart_item_image">
                    <img src="{{ asset('uploads/products/' . $item->product->thumbnail) }}" alt="shop">
                </div>
                <div class="c-item-body">
                    <div class="cart_item_title mb-2">
                        <h4>{{ $item->product->name }}</h4>
                        {{-- <p class="small mb-0 text-muted">{{ $item->product->description }}</p> --}}
                    </div>
                    <div class="cart_item_price">
                        <div class="product-price">
                            <span>
                                
                                <strong>Price ${{ $item->product->price }} </strong>
                                @if ($item->product->before_discount_price)
                                    <del>${{ $item->product->before_discount_price }}</del>
                                    <small class="product-discountPercentage">
                                        ({{ round(100 - ($item->product->price / $item->product->before_discount_price) * 100) }}% OFF)
                                    </small>
                                @endif
                            </span>
                        </div>
                        <div class="cart_product_remove">
                            <span class="text-danger"  wire:click="removeFromWishlist({{ $item->id }})" style="cursor: pointer;">
                                <i class="ti-trash"></i> Remove
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
