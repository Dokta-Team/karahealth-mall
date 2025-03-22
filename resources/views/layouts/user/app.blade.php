<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kera - Panel</title>

    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('favicon/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('favicon/site.webmanifest') }}">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- [Favicon] icon -->
    <link rel="stylesheet" href="{{ asset('admin/fonts/inter/inter.css') }}" id="main-font-link">
    <link rel="stylesheet" href="{{ asset('admin/fonts/tabler-icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/fonts/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/fonts/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/fonts/material.css') }}">
    <!-- [Template CSS Files] -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}" id="main-style-link">
    <link rel="stylesheet" href="{{ asset('admin/css/style-preset.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.css" rel="stylesheet">

    @livewireStyles



    <style>
        .table {
            font-size: 12px !important;
        }

        .datatable-table thead th,
        .table thead th {
            font-size: 12px !important;
        }

        .font-25{
            font-size: 25px;
        }

        .p-info{
            padding: 5px 0 5px 0;
            display: flex;
            justify-content: space-between;
        }

        .request-card:hover{
            background-color: #ebebeb;
            cursor: pointer;
        }
        .list-group-item{
            background-color: transparent
        }

        .modal-confirm .modal-content {
	padding: 20px;
	border-radius: 5px;
	border: none;
	text-align: center;
	font-size: 14px;
}
.modal-confirm .modal-header {
	border-bottom: none;   
	position: relative;
}
.modal-confirm h4 {
	text-align: center;
	font-size: 26px;
	margin: 30px 0 -10px;
}
.modal-confirm .close {
	position: absolute;
	top: -5px;
	right: -2px;
}
.modal-confirm .modal-body {
	color: #999;
}
.modal-confirm .modal-footer {
	border: none;
	text-align: center;		
	border-radius: 5px;
	font-size: 13px;
	padding: 10px 15px 25px;
}
.modal-confirm .modal-footer a {
	color: #999;
}		
.modal-confirm .i-box {
	width: 80px;
	height: 80px;
	margin: 0 auto;
	border-radius: 50%;
	z-index: 9;
	text-align: center;
	border: 3px solid #f15e5e;
}
.modal-confirm .i-box i {
	color: #f15e5e;
	font-size: 46px;
	display: inline-block;
	margin-top: 13px;
}


        .input-group-text {
            border-top-right-radius: 0px;
            border-bottom-right-radius: 0px;
            min-width: 100px;

        }


        .dz-flex, .dz-rounded{
            border-radius: 8px !important;
            

        }
   
        .dz-items-start{
            padding: 10px;
        }

        .toast-small {
            display: none;
            padding: 20px;
            border-radius: 50px;
            margin: 30px auto;
            top: 20px;
            left: 50%;
            position: fixed;
            transform: translateX(-50%);
            background: rgba(0, 0, 0, .9);
            color: #fff;
            z-index: 999999;
        }
    
     
    </style>

</head>
<!-- [Head] end -->
<!-- [Body] Start -->

<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast=""
    data-pc-theme="light">

    <div class="loader-bg">
        <div class="loader-track">
            <div class="loader-fill"></div>
        </div>
    </div>

    <nav class="pc-sidebar">
        <div class="navbar-wrapper">
            <div class="m-header">
                <a href="{{ route('dashboard') }}" class="b-brand text-primary">
                    <!-- ========   Change your logo from here   ============ -->
                    <img src="{{ asset('assets/img/logo.png') }}" height="50" alt="logo">
                </a>
            </div>
            <div class="navbar-content">
                <div class="card pc-user-card">
                    <div class="card-body">
                        <div class="d-flex align-items-center">
                            <div class="flex-shrink-0">
                                <img src="{{ asset('uploads/users/' . auth()->user()->profile_image) }}" alt="user-image"
                                    class="user-avtar wid-45 rounded-circle">
                            </div>
                            <div class="flex-grow-1 ms-3 me-2">
                                <h6 class="mb-0">{{ auth()->user()->name }}</h6>
                                <small>{{ ucfirst(auth()->user()->role->name) }} Account</small>
                            </div>

                        </div>

                    </div>
                </div>

                <ul class="pc-navbar">
                    <li class="pc-item pc-caption">
                        <label>Dashboard</label>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('user.dashboard') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="fa-solid fa-chart-line"></i>
                            </span>
                            <span class="pc-mtext">Dashboard</span>
                        </a>
                    </li>
                    @if(auth()->user()->role->name == 'admin')
                    <li class="pc-item">
                        <a href="{{ route('user.categories') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="fa-solid fa-list"></i>
                            </span>
                            <span class="pc-mtext">Categories</span>
                        </a>
                    </li>
                    @endif

                   

                    @if(auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'vendor')

                    <li class="pc-item pc-caption"><label data-i18n="Products">Products</label></li>


                    <li class="pc-item">
                        <a href="{{ route('user.products') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="fa-solid fa-cubes"></i>
                            </span>
                            <span class="pc-mtext">Products</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('user.delivery-orders') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="fa-solid fa-truck"></i>
                            </span>
                            <span class="pc-mtext">Delivery Orders</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('user.pickup-orders') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="fa-solid fa-shop"></i>
                            </span>
                            <span class="pc-mtext">Pickup Orders</span>
                        </a>
                    </li>
                    <li class="pc-item">
                        <a href="{{ route('user.transactions') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="fa-solid fa-dollar-sign"></i>
                            </span>
                            <span class="pc-mtext">Payment and Earnings</span>
                        </a>
                    </li>

                    @endif

                    @if(auth()->user()->role->name == 'admin' || auth()->user()->role->name == 'profession')
                    <li class="pc-item pc-caption"><label data-i18n="Profession">Profession</label></li>
                    <li class="pc-item">
                        <a href="{{ route('user.add-profession') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="fa-solid fa-plus"></i>
                            </span>
                            <span class="pc-mtext">Add Profession</span>
                        </a>
                    </li>

                    @foreach($data['profession_categories'] as $key => $category)
                    
                    <li class="pc-item pc-hasmenu">
                        <a href="#!" class="pc-link"><span class="pc-micon"><svg class="pc-icon">
                                    <use xlink:href="#custom-document"></use>
                                </svg> </span><span class="pc-mtext" data-i18n="Layouts">{{ $category->name }}</span>
                            <span class="pc-arrow"><i data-feather="chevron-right"></i></span></a>
                        <ul class="pc-submenu">
                            @foreach($category->subCategories as $key => $item)
                                <li class="pc-item">
                                    <a class="pc-link" href="{{ route('user.professions', ['slug' => $item->slug]) }}"
                                        data-i18n="Vertical">{{ $item->name }}</a>
                                </li>
                            @endforeach
                            
                        </ul>
                    </li>
                    @endforeach

                    <li class="pc-item pc-caption"><label data-i18n="Users">Users</label></li>
                    
                    @endif

                    @if(auth()->user()->role->name == 'admin')

                    <li class="pc-item">
                        <a href="{{ route('user.users') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="fa-solid fa-users"></i>
                            </span>
                            <span class="pc-mtext">Users</span>
                        </a>
                    </li>

                    @endif

                    <li class="pc-item">
                        <a href="{{ route('profile') }}" class="pc-link">
                            <span class="pc-micon">
                                <i class="fa-solid fa-user"></i>
                            </span>
                            <span class="pc-mtext">Profile</span>
                        </a>
                    </li>
              
                </ul>
            </div>
        </div>
    </nav>
    <!-- [ Sidebar Menu ] end -->

    <!-- [ Header Topbar ] start -->
    <header class="pc-header">
        <div class="header-wrapper"> <!-- [Mobile Media Block] start -->
            <div class="me-auto pc-mob-drp">
                <ul class="list-unstyled">
                    <!-- ======= Menu collapse Icon ===== -->
                    <li class="pc-h-item pc-sidebar-collapse">
                        <a href="#" class="pc-head-link ms-0" id="sidebar-hide">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>
                    <li class="pc-h-item pc-sidebar-popup">
                        <a href="#" class="pc-head-link ms-0" id="mobile-collapse">
                            <i class="ti ti-menu-2"></i>
                        </a>
                    </li>

                </ul>
            </div>
            <!-- [Mobile Media Block end] -->
            <div class="ms-auto">
                <ul class="list-unstyled">
                    <li class="dropdown pc-h-item">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" aria-expanded="false">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-sun-1"></use>
                            </svg>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                            <a href="#!" class="dropdown-item" onclick="layout_change('dark')">
                                <svg class="pc-icon">
                                    <use xlink:href="#custom-moon"></use>
                                </svg>
                                <span>Dark</span>
                            </a>
                            <a href="#!" class="dropdown-item" onclick="layout_change('light')">
                                <svg class="pc-icon">
                                    <use xlink:href="#custom-sun-1"></use>
                                </svg>
                                <span>Light</span>
                            </a>
                            <a href="#!" class="dropdown-item" onclick="layout_change_default()">
                                <svg class="pc-icon">
                                    <use xlink:href="#custom-setting-2"></use>
                                </svg>
                                <span>Default</span>
                            </a>
                        </div>
                    </li>

                 

                    <li class="dropdown pc-h-item header-user-profile">
                        <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown"
                            href="#" role="button" aria-haspopup="false" data-bs-auto-close="outside"
                            aria-expanded="false">
                            <img src="{{ asset('uploads/users/' . auth()->user()->profile_image) }}" alt="user-image"
                                class="user-avtar">
                        </a>
                        <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                            <div class="dropdown-header d-flex align-items-center justify-content-between">
                                <h5 class="m-0">Profile</h5>
                            </div>
                            <div class="dropdown-body">
                                <div class="profile-notification-scroll position-relative"
                                    style="max-height: calc(100vh - 225px)">
                                    <div class="d-flex mb-1">
                                        <div class="flex-shrink-0">
                                            <img src="{{ asset('uploads/users/' . auth()->user()->profile_image) }}" alt="user-image"
                                                class="user-avtar wid-35">
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">{{ ucfirst(auth()->user()->name) }} 🖖</h6>
                                            <span>{{ auth()->user()->email }}</span>
                                        </div>
                                    </div>
                                    <hr class="border-secondary border-opacity-50">

                                  
                                    <a href="{{ route('profile') }}" class="dropdown-item">
                                        <span>
                                            <svg class="pc-icon text-muted me-2">
                                                <use xlink:href="#custom-setting-outline"></use>
                                            </svg>
                                            <span>Profile</span>
                                        </span>
                                    </a>
                                    <a href="#" class="dropdown-item">
                                        <span>
                                            <svg class="pc-icon text-muted me-2">
                                                <use xlink:href="#custom-message-2"></use>
                                            </svg>
                                            <span>Need Help?</span>
                                        </span>
                                    </a>
                                    

                                    <hr class="border-secondary border-opacity-50">
                                    <div class="d-grid mb-3">
                                        <a class="btn btn-primary" href="{{ route('logout') }}">
                                            <svg class="pc-icon me-2">
                                                <use xlink:href="#custom-logout-1-outline"></use>
                                            </svg>Logout
                                        </a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </header>



    @yield('content')

    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to delete?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="externalDismissButton" data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn btn-danger" id="externalDeleteButton" data-bs-dismiss="modal">Delete</button>
                </div>
            </div>
        </div>
    </div>


    <div id="notification-alert" class="toast-small " role="alert" data-delay="1500">
        <div class="toast-body" id="notification-alert-body">
        </div>
    </div>


  

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

    <script src="{{ asset('admin/js/plugins/apexcharts.min.js') }}"></script>
    <script src="{{ asset('admin/js/pages/dashboard-default.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('admin/js/pcoded.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/feather.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.9.0/dist/summernote.min.js"></script>

  



    @livewireScripts

    <script>
        $(document).ready(function() {
            Livewire.on('show-delete-modal', () => {
                $('#deleteModal').modal('show');
            });

            Livewire.on('render-script', function(data) {
                  $('.summernote').summernote();
          });

          
          $('#externalDismissButton').on('click', function() {
                Livewire.dispatch('dismiss');
            });

            $('#externalDeleteButton').on('click', function() {
                Livewire.dispatch('delete');
            });

            Livewire.on('show-toast', function(data) {
            var message = data[0].message;
            $('#notification-alert-body').text(message);
            $('#notification-alert').show();
            setTimeout(function() {
                $('#notification-alert').hide();
            }, 1500);
        });

              $('.summernote').summernote();
          });

      

  </script>

@yield('script')


</body>

</html>