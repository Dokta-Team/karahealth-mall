

<style>
    .header-links-container{
        text-align: center;
    }
</style>
<div class="header">
    <div class="container-fluid theme-container">
        <div class="top-header">
            <div class="row align-items-center">
                <div class="col-auto">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="header-logo">
                    </a>
                </div>
                <div class="col">
                    <div class="header-search">
                        <form action="{{ route('search') }}" method="get">
                            <input class="form-control custom-search" name="q" value="{{ request('q') }}" placeholder="Search for Medicines and Health Products" type="text">
                        </form>
                   
                    </div>
                </div>
                <div class="col-auto">
                    <ul class="header-right-options">
                        @if(!auth()->user())
                            <li class="link-item">
                                <a href="{{ route('login') }}">Login</a>
                            </li>
                            <li class="link-item">
                                <a href="{{ route('register') }}" >Register</a>
                            </li>
                            <li class="dropdown head-cart-content">
                                <a class="btn cart" href="{{ route('cart') }}">
                                    <div class="list-icon">
                                        <i class="ti-bag"></i>
                                    </div>
                                </a>
    
                            </li>
                        @else
                        <li class="dropdown head-cart-content">
                            <a class="btn cart" href="{{ route('cart') }}">
                                <div class="list-icon">
                                    <i class="ti-bag"></i>
                                </div>
                                {{-- <span class="badge badge-secondary">2</span> --}}

                            </a>

                        </li>
                        {{-- <li class="dropdown head-cart-content">
                            <button id="dropdownCartButton" class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="list-icon">
                                    <i class="ti-bag"></i>
                                </div>
                                <span class="badge badge-secondary">2</span>
                            </button>

                            <div class="shopping-cart shopping-cart-empty dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                <!-- <ul class="shopping-cart-items">
                                    <li>You have no items in your shopping cart.</li>
                                </ul> -->
                                <ul class="shopping-cart-items">
                                    <li class="mini_cart_item">
                                        <div class="left-section">
                                            <a href="javascript:;">
                                                <img src="assets/img/product/product-2.png" alt="">
                                            </a>
                                        </div>
                                        <div class="right-section">
                                            TruRadix Curcumin Oral Strip Orange Mango
                                            <div>
                                                <div class="item-desc">Qty: 1</div>
                                                <div class="item-desc">₹ 237</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="mini_cart_item">
                                        <div class="left-section">
                                            <a href="javascript:;">
                                                <img src="assets/img/product/product-1.png" alt="">
                                            </a>
                                        </div>
                                        <div class="right-section">
                                            TruRadix Curcumin Oral Strip Orange Mango
                                            <div>
                                                <div class="item-desc">Qty: 1</div>
                                                <div class="item-desc">₹ 237</div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="w-100 d-block">
                                        <a href="javascript:;" class="btn btn-primary w-100 d-block">
                                            Proceed to Cart
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </li> --}}
                        <li class="dropdown">
                            <button id="dropdownCartButton" class="btn dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <div class="list-icon">
                                    <i class="ti-user"></i>
                                </div>
                            </button>

                            <div class="dropdown-menu dropdown-menu-right user-links" aria-labelledby="dropdownMenuButton">
                                @if(auth()->user()->role->name == 'customer')
                                <ul>
                                    <li>
                                        <a href="{{ route('dashboard') }}">
                                            Orders
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('customer.wishlist') }}">
                                            Wishlist
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('customer.address') }}">
                                            Address
                                        </a>
                                    </li>
                                   
                                    <li>
                                        <a href="{{ route('customer.account') }}">
                                            My Account
                                        </a>
                                    </li>
                                   
                                    <li>
                                        <a href="{{ route('logout') }}">
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                                @else
                                <ul>
                                    <li>
                                        <a href="{{ route('dashboard') }}">
                                            Dashboard
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.products') }}">
                                            Products
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.delivery-orders') }}">
                                            Delivery Orders
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('user.pickup-orders') }}">
                                            Pickup Orders
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile') }}">
                                            Profile
                                        </a>
                                    </li>
                                   
                                    <li>
                                        <a href="{{ route('logout') }}">
                                            Logout
                                        </a>
                                    </li>
                                </ul>
                                @endif
                            </div>
                        </li>
                        @endif
                
                    </ul>
                </div>
            </div>
        </div>
        <div class="header-links">
            <div class="container-fluid theme-container">
                <ul class="header-links-container">

                    @foreach($data['categories'] as $key => $category)

                    <li class="header-links-item">
                        <div class="header-childrenItem-parent">
                            <a href="{{ route('search', ['category' => $category->slug]) }}">
                                <span class="header-childrenItem-link-text">{{ $category->name }}
                                </span>
                            </a>
                            @if($category->sub_categories()->count() > 0)

                            <i class="fa fa-angle-down drop-icon"></i>
                            @endif
                        </div>
                        @if($category->sub_categories()->count() > 0)
                        <div class="header-childrenItem-child-category-links">
                            <ul class="header-childrenItem-child-list">
                                @foreach($category->sub_categories() as $key => $sub_category)
                                <li>
                                    <a href="{{ route('search', ['category' => $category->slug, 'sub_category' => $sub_category->slug]) }}" class="childItem-level-3">
                                        <span class="header-childrenItem-link-text">{{ $sub_category->name }}</span>
                                    </a>
                                </li>  
                                @endforeach
                              


                            </ul>

                        </div>
                        @endif
                    </li>
                    @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>

<div class="mobile-header">
    <div class="container-fluid theme-container">
        <div class="row align-items-center">
            <div class="col-auto">
                <ul class="header-left-options">
                    <li class="link-item open-sidebar">
                        <i class="ti-menu"></i>
                    </li>
                </ul>
            </div>
            <div class="col text-center">
                <img src="assets/img/logo.png" alt="logo" class="header-logo">
            </div>
            <div class="col-auto">
                <ul class="header-right-options">
                    <li class="link-item">
                        <span class="badge badge-secondary">0</span>
                        <i class="ti-bag"></i>
                    </li>
                </ul>
            </div>
        </div>
        <div class="menu-sidebar">
            <div class="close">
                <i class="ti-close"></i>
            </div>

            <div class="welcome d-flex align-items-center">
                <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#login_modal" class="btn btn-soft-primary btn-md">Login</a>
                <a href="#" data-toggle="modal" data-dismiss="modal" data-target="#register_modal" class="btn btn-primary btn-md">Register</a>
                <!-- <div class="avater btn-soft-primary">H</div>
                <span>Hi, Deep saha</span> -->
            </div>
            <div class="mobileMenuLinks mb-4 mt-2">
                <h6>Account Info</h6>
                <ul>
                    <li><a href="javascript:;">Account</a></li>
                    <li><a href="javascript:;">My Orders</a></li>
                    <li><a href="javascript:;">Wish List</a></li>
                    <li><a href="javascript:;">Logout</a></li>
                </ul>
            </div>
            <div class="mobileMenuLinks">
                <h6>Category</h6>
                <ul>
                    <li><a href="javascript:;">AllProducts</a></li>

                </ul>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
</div>