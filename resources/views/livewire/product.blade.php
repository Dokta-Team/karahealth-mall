<div>
    <section class="section-padding mt-4">
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div wire:ignore class="col-lg-4">
                    <!--=======  product details slider area  =======-->
                    <div class="product-details-slider-area">
                        <div class="big-image-wrapper">
                            <div class="product-details-big-image-slider-wrapper slider-for" data-autoplay="false" data-nav="false">
                                @foreach($product->images as $key => $image)
                                <div class="single-image">
                                    <img src="{{ asset('uploads/products/'.$image->image_path ) }}" alt="slider">
                                </div> 
                                @endforeach
                              
                               
                            </div>
                            <div class="slider-nav product-details-small-image-slider-wrapper" data-slides-to-show="3" data-autoplay="false" data-slick-center-mode="true" data-nav="false">
                                @foreach($product->images as $key => $image)
                                <div class="single-image">
                                    <img src="{{ asset('uploads/products/'.$image->image_path ) }}" alt="slider">
                                </div> 
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <!--======= End of product details slider area =======-->
                </div>
                <div class="col-lg-8 mt-4">
                    <div class="row pl-lg-3">
                        <div class="col-lg-7">
                            <div class="single-product-content-description">
                                <p class="single-info">Category <a href="{{ route('search', ['category' => $product->category->name]) }}">{{ $product->category->name }}</a> </p>
                                <h4 class="product-title">{{ $product->name }}</h4>
                                {{-- <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span class="review-count ml-3">4.5 (2,213)</span>
                                </div> --}}
                                <p class="single-grid-product__price"><span class="discounted-price">{{ $product->price }} USD</span> <span class="main-price discounted">{{ $product->before_discount_price }} USD</span></p>
    
                                <div class="single-info">
                                    <span class="d-block text-muted mb-2"><strong>SKU :</strong> {{ $product->sku }}</span>
                                    <span class="d-block text-muted mb-2"><strong>Category :</strong> <a href="{{ route('search', ['category' => $product->category->name]) }}">{{ $product->category->name }}</a></span>
    
                                    <span class="d-block text-muted mb-2"><strong>Availability :</strong> {{ $product->quantity > 0 ? 'In Stock' : 'Out of stock' }}</span>
                                </div>
    
                                <div class="varient mt-4">
                                    <h6 class="font-weight-bold text-dark mb-3">Product Varient</h6>
                                    <div class="row box-checkbox">
                                        @foreach($product->varients as $key => $item)
                                        <label tabindex="0">
                                            <input type="radio" wire:model="varients" value="{{ $item->id }}" name="varients">
                                            <div class="icon-box">
                                                <div class="label">{{ $item->name }}</div>
                                                <span class="value">${{ $item->price }}</span>
                                            </div>
                                        </label>  
                                        @endforeach
                                        
                                       
                                    </div>
                                </div>
    
                                <div class="product-actions my-4 justify-content-between">
                                    <!-- Quantity -->
                                    <div class="qty-input btn">
                                        <i class="less">-</i>
                                        <input type="text" wire:model="count" value="1">
                                        <i class="more">+</i>
                                    </div>
                                    <!-- End Quantity -->
                                    <div class="product-buttons ml-0 ml-md-3 mt-4 mt-md-0 text-md-left text-center">
                                        @if(auth()->user() && auth()->user()->role->name == 'customer')
                                            <a class="btn btn-rounded btn-soft-primary mr-2" wire:click="addToWishlist" style="cursor: pointer;">
                                                <i class="fa fa-heart"></i> Add To Wishlist
                                            </a>
                                            {{-- <a class="btn btn-rounded btn-soft-primary mr-2" href="#"> <i class="fa fa-heart"></i> Add To Wishlist</a> --}}
                                        @else
                                            <a class="btn btn-rounded btn-soft-primary mr-2" href="{{ route('login') }}"> <i class="fa fa-heart"></i> Add To Wishlist</a>
                                        @endif
                                        {{-- <a class="btn btn-rounded btn-primary" href="cart.html"> <i class="fa fa-shopping-cart"></i> Add To Cart</a> --}}
                                    </div>
    
                                </div>
                                @if (session()->has('success'))
                                <div class="alert alert-success" id="wishlist-message">
                                    <strong class="text-success">{{ session('success') }}</strong>
                                </div>
                            @endif
                        
                            @if (session()->has('error'))
                                <div class="alert alert-danger" id="wishlist-message">
                                    <strong class="text-danger">{{ session('error') }}</strong>
                                </div>
                            @endif
                                <div class="mb-4">
                                    @if(auth()->user() && auth()->user()->role->name == 'customer')
                                   
                                    <a  class="btn btn-block btn-primary btn-pill transition-3d-hover" wire:click="addToCart"><i class="fa fa-shopping-cart"></i> Add To Cart</a>
                                @else
                                    <a  class="btn btn-block btn-primary btn-pill transition-3d-hover" href="{{ route('login') }}"><i class="fa fa-shopping-cart"></i> Add To Cart</a>
                                @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5 mt-4 mt-lg-0">
                            <div class="bg-light p-3">
                                <h6>Delivery Options</h6>
                                <div class="media align-items-center">
                                    <span class="mr-2">
                                        <i class="ti-check text-primary small"></i>
                                    </span>
                                    <div class="media-body text-body small">
                                        <span class="font-weight-bold mr-1">Free Shipping</span>
                                    </div>
                                </div>
                                <div class="media align-items-center">
                                    <span class="mr-2">
                                        <i class="ti-check text-primary small"></i>
                                    </span>
                                    <div class="media-body text-body small">
    
                                    @if($product->delivery_available)
                                        <span class="font-weight-bold mr-1">Delivery Available</span>
                                    @else
                                        <span class="font-weight-bold mr-1">In Store Purchase Available</span>
                                    @endif
                                </div>
    
                                </div>
                                <div class="media align-items-center">
                                    <span class="mr-2">
                                        <i class="ti-check text-primary small"></i>
                                    </span>
                                    <div class="media-body text-body small">
                                        <span class="font-weight-bold mr-1"> 14 days Return</span>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <h6 class="font-weight-bold text-dark">Products highlights</h6>
                                <ul class="pl-3">
                                    <li>Premium quality Products</li>
                                    <li>Secure Payment Methods</li>
                                    <li>24/7 Customer Support</li>
                                    <li>Fast & Reliable Shipping</li>
                                    <li>100% Authentic Products</li>
                                </ul>
                            </div>
                            <div class="mt-4">
                                <h6 class="font-weight-bold text-dark">Share on</h6>
                                <div class="social-links social-links-dark">
                                    <a href="#">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-twitter"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-youtube"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-dribbble"></i>
                                    </a>
                                    <a href="#">
                                        <i class="fa fa-behance"></i>
                                    </a>
    
                                </div>
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--=======  product description review   =======-->
        <div class="product-full-description">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="entry-product-section-heading">Description</h3>
                            {!! $product->detail !!}
                    </div>
                </div>
            </div>
        </div>
        
        <div class="single-row-slider-area pt-7">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12 text-center mb-4">
                        <h2>Related Products</h2>
                        <p>Mirum est notare quam littera gothica, quam nunc putamus parum
                            claram anteposuerit litterarum formas.</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="slider  arrow-light slider-gap" data-slides-to-show="6" data-autoplay="true" data-nav="true" data-dots="false">
                            
                            @foreach($related as $key => $item)
                            <div class="product">
                                <a href="{{ route('product', ['slug' => $item->slug]) }}" class="product-img">
                                    <img src="{{ asset('uploads/products/' . $item->thumbnail) }}" class="" alt="">
                                </a>
                                <div class="product-info">
                                    {{-- <div class="product-rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-half-o"></i>
                                        <i class="fa fa-star-o"></i>
                                        <div class="review-count">4.5 (2,213)</div>
                                    </div> --}}
                                    <h3>
                                        <a href="{{ route('product', ['slug' => $item->slug]) }}" class="truncated-text">
                                            {{ $item->name }}</a>
                                    </h3>
                                    <div class="product-value">
                                        @if ($item->before_discount_price)
                                            <div class="d-flex">
                                                <small class="regular-price"><del>{{ $item->before_discount_price }}
                                                        USD</del></small>
                                                <div class="off-price">
                                                    {{ round((($item->before_discount_price - $item->price) / $item->before_discount_price) * 100, 2) }}%
                                                    off</div>
                                            </div>
                                        @endif
                                        <div class="current-price">{{ $item->price }} USD</div>
        
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
