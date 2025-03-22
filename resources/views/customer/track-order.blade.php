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
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Order Details</li>
                    </ol>
                </nav>
            </div>
            <div class="order-md-1 text-center text-md-left col-lg col-12">
                <h1 class="h3 mb-0">Order Details</h1>
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
                                <h5 class="mb-1 text-white">Order Details</h5>
                                <p class="mb-0 text-white small">
                                    Track the real-time status and details of your orders here.
                                </p>
                            </div>
                            <div class="col-auto">
                                <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm"> <i class="ti-angle-left"></i> Go Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="cart_product border-0">
                                <div class="cart_item">
                                    <div class="cart_item_image">
                                        <img src="{{ asset('uploads/products/' . $order->product->thumbnail) }}" alt="item">
                                    </div>
                                    <div class="c-item-body">
                                        <div class="cart_item_title mb-1">
                                            <h4>{{ $order->product->name }}</h4>
                                            @if ($order->productVariant)
                
                                            <p class="small mb-0 text-muted">
                                                {{ $order->productVariant->name }}
                                            </p>
                                            @endif
                
                                        </div>
                                        <div class="cart_item_price">
                                            <div class="product-price">
                                                <span>
                                                    <strong>${{ $order->product->price }}</strong>
                                                    @if ($order->product->before_discount_price)
                                                        <del>${{ $order->product->before_discount_price }}</del>
                                                        <small class="product-discountPercentage">
                                                            ({{ round(100 - ($order->product->price / $order->product->before_discount_price) * 100) }}% OFF)
                                                        </small>
                                                    @endif
                                                </span>
                                            </div>
                                           
                                        </div>
                                    </div>
                                 
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-lg-12">
                                    <div class="border p-3 mb-4">
                                        <h5 class="details">Order Info</h5>
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <i class="ti-map-alt text-secondary mr-2"></i>
                                            </div>
                                            <div class="col">
                                                <p class="text-muted small mb-2"> <strong>Delevery Address:</strong> 

                                                    {{ $order->address->address }},
                                                    @if ($order->address->apt) {{ $order->address->apt }}, @endif
                                                    {{ $order->address->city }}, {{ $order->address->state }} - {{ $order->address->zip_code }},
                                                    {{ $order->address->country }}
                                                
                                                </p>
                                            </div>
                                        </div>
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <i class="ti-mobile text-secondary mr-2"></i>
                                            </div>
                                            <div class="col">
                                                <p class="text-muted small mb-0"><strong>Phone Number:</strong> {{ $order->address->phone }}</p>
                                            </div>
                                        </div>
                                        {{-- <div class="row no-gutters">
                                            <div class="col-auto">
                                                <i class="ti-credit-card text-secondary mr-2"></i>
                                            </div>
                                            <div class="col">
                                                <p class="text-muted small mb-2"><strong>Payment Type:</strong> {{  }}</p>
                                            </div>
                                        </div> --}}
                                        <div class="row no-gutters">
                                            <div class="col-auto">
                                                <i class="ti-calendar text-secondary mr-2"></i>
                                            </div>
                                            <div class="col">
                                                <p class="text-muted small mb-2"><strong>Order Receive On:</strong> {{ $order->purchased_date ? \Carbon\Carbon::parse($order->purchased_date)->format('M d, Y') : 'N/A' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="timeline mt-4">
                                
                                <li class="timeline-item {{ $order->status == 'Order placed' ? 'active' : '' }}">
                                    
                                    <div class="timeline-figure">
                                        <span class="tile tile-circle tile-sm"><i class="ti-arrow-circle-down"></i></span>
                                    </div>
                                    
                                    <div class="timeline-body">
                                       
                                        <div class="media">
                                            
                                            <div class="media-body">
                                                <h6 class="timeline-heading">
                                                    
                                                    <a href="#" class="text-link">Order placed</a>

                                                </h6>
                                            </div>
                                            {{-- <div class="d-none d-sm-block">
                                                <span class="timeline-date">About a minute ago</span>
                                            </div> --}}
                                        </div>
                                    </div>
                                </li>
                                
                                <li class="timeline-item {{ $order->status == 'Order Ready' ? 'active' : '' }}">
                                    
                                    <div class="timeline-figure">
                                        <span class="tile tile-circle tile-sm"><i class="ti-arrow-circle-down"></i></span>
                                    </div>
                                    
                                    <div class="timeline-body">
                                       
                                        <div class="media">
                                            
                                            <div class="media-body">
                                                <h6 class="timeline-heading">
                                                    <a href="#" class="text-link">Order Ready</a>
                                                </h6>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-item {{ $order->status == 'Way to deliver' ? 'active' : '' }}">
                                    
                                    <div class="timeline-figure">
                                        <span class="tile tile-circle tile-sm"><i class="ti-arrow-circle-down"></i></span>
                                    </div>
                                    
                                    <div class="timeline-body">
                                       
                                        <div class="media">
                                            
                                            <div class="media-body">
                                                <h6 class="timeline-heading">
                                                    <a href="#" class="text-link">Way to deliver</a>
                                                </h6>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </li>
                                <li class="timeline-item {{ $order->status == 'Delivered successfully' ? 'active' : '' }}">
                                    
                                    <div class="timeline-figure">
                                        <span class="tile tile-circle tile-sm"><i class="ti-arrow-circle-down"></i></span>
                                    </div>
                                    
                                    <div class="timeline-body">
                                       
                                        <div class="media">
                                            
                                            <div class="media-body">
                                                <h6 class="timeline-heading">
                                                    <a href="#" class="text-link">Delivered successfully</a>
                                                </h6>
                                            </div>
                                            
                                            
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection