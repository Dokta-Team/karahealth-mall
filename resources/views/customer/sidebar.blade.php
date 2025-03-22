<div class="col-lg-3 col-md-3 col-12">
    <nav class="navbar navbar-expand-md mb-4 mb-lg-0 sidenav">
        <!-- Menu -->
        <a class="d-xl-none d-lg-none d-md-none text-inherit fw-bold" href="#">Sidebar Menu</a>
        <!-- Button -->
        <button class="navbar-toggler d-md-none rounded bg-primary text-light" type="button" data-toggle="collapse" data-target="#sidenav" aria-controls="sidenav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="ti-menu"></span>
        </button>
        <!-- Collapse navbar -->
        <div class="collapse navbar-collapse" id="sidenav">
            <div class="navbar-nav flex-column">
                <!-- List -->
                <div class="border-bottom">
                    <div class="m-4">
                        <div class="row no-gutters align-items-center">
                            <div class="col-auto">
                                <div class="avater btn-soft-primary">{{ strtoupper(implode('', array_map(function($word) { return $word[0]; }, explode(' ', auth()->user()->name)))) }}
                                </div>
                            </div>
                            <div class="col-auto">
                                <h6 class="d-block font-weight-bold mb-0">{{ auth()->user()->name }}</h6>
                                <small class="text-muted">{{ auth()->user()->email }}</small>
                            </div>
                        </div>
                    </div>
                </div>
                <ul class="list-unstyled mb-0">
                    <li class="nav-item {{ request()->routeIs('customer.orders') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('customer.orders') }}"><i class="fa fa-shopping-cart"></i>
                            Orders</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('customer.wishlist') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('customer.wishlist') }}"><i class="fa fa-heart"></i>
                            Wishlist</a>
                    </li>
                   
                    
                    <li class="nav-item {{ request()->routeIs('customer.transactions') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('customer.transactions') }}"><i class="fa fa-shopping-cart"></i>
                            Transaction history</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('customer.address') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('customer.address') }}"><i class="fa fa-address-book"></i>
                            Address</a>
                    </li>
                    <li class="nav-item {{ request()->routeIs('customer.account') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('customer.account') }}"><i class="fa fa-user"></i> My
                            Account</a>
                    </li>
                 
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('logout') }}"><i class="fa fa-sign-out"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>