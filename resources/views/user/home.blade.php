@extends('layouts.user.app')

@section('content')
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Dashboard</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <div class="page-header-title">
                                <h2 class="mb-0">Good Evening, {{ auth()->user()->name }}!</h2>
                                <p>Here’s an overview of your analytics</p>
                            </div>
                         
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-xxl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avtar avtar-s bg-light-primary">
                                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.4" d="M13 9H7" stroke="#4680FF" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path
                                                            d="M22.0002 10.9702V13.0302C22.0002 13.5802 21.5602 14.0302 21.0002 14.0502H19.0402C17.9602 14.0502 16.9702 13.2602 16.8802 12.1802C16.8202 11.5502 17.0602 10.9602 17.4802 10.5502C17.8502 10.1702 18.3602 9.9502 18.9202 9.9502H21.0002C21.5602 9.9702 22.0002 10.4202 22.0002 10.9702Z"
                                                            stroke="#4680FF" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path
                                                            d="M17.48 10.55C17.06 10.96 16.82 11.55 16.88 12.18C16.97 13.26 17.96 14.05 19.04 14.05H21V15.5C21 18.5 19 20.5 16 20.5H7C4 20.5 2 18.5 2 15.5V8.5C2 5.78 3.64 3.88 6.19 3.56C6.45 3.52 6.72 3.5 7 3.5H16C16.26 3.5 16.51 3.50999 16.75 3.54999C19.33 3.84999 21 5.76 21 8.5V9.95001H18.92C18.36 9.95001 17.85 10.17 17.48 10.55Z"
                                                            stroke="#4680FF" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-0">All Earnings</h6>
                                            </div>
                                        </div>
                                        <div class="bg-body p-3 mt-3 rounded">
                                            <div class="mt-3 row align-items-center">
                                                <div class="col-7">
                                                    <div id="all-earnings-graph"></div>
                                                </div>
                                                <div class="col-5">
                                                    <h5 class="mb-1">$3,020</h5>
                                                    <p class="text-primary mb-0"><i class="ti ti-arrow-up-right"></i> 30.6%</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xxl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avtar avtar-s bg-light-warning">
                                                   

                                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M8 2V5" stroke="#E58A00" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path d="M16 2V5" stroke="#E58A00" stroke-width="1.5"
                                                            stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path opacity="0.4" d="M3.5 9.08984H20.5" stroke="#E58A00"
                                                            stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                        <path
                                                            d="M21 8.5V17C21 20 19.5 22 16 22H8C4.5 22 3 20 3 17V8.5C3 5.5 4.5 3.5 8 3.5H16C19.5 3.5 21 5.5 21 8.5Z"
                                                            stroke="#E58A00" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path opacity="0.4" d="M15.6947 13.7002H15.7037" stroke="#E58A00"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                        <path opacity="0.4" d="M15.6947 16.7002H15.7037" stroke="#E58A00"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                        <path opacity="0.4" d="M11.9955 13.7002H12.0045" stroke="#E58A00"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                        <path opacity="0.4" d="M11.9955 16.7002H12.0045" stroke="#E58A00"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                        <path opacity="0.4" d="M8.29431 13.7002H8.30329" stroke="#E58A00"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                        <path opacity="0.4" d="M8.29395 16.7002H8.30293" stroke="#E58A00"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                        </path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-0">This Month</h6>
                                            </div>
                                        </div>
                                        <div class="bg-body p-3 mt-3 rounded">
                                            <div class="mt-3 row align-items-center">
                                                <div class="col-7">
                                                    <div id="page-views-graph"></div>
                                                </div>
                                                <div class="col-5">
                                                    <h5 class="mb-1">290K+</h5>
                                                    <p class="text-warning mb-0"><i class="ti ti-arrow-up-right"></i> 30.6%</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                         
                            <div class="col-md-6 col-xxl-4">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-shrink-0">
                                                <div class="avtar avtar-s bg-light-warning">
                                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M12 22C17.5228 22 22 17.5228 22 12C22 6.47715 17.5228 2 12 2C6.47715 2 2 6.47715 2 12C2 17.5228 6.47715 22 12 22Z"
                                                            stroke="#DC2626" stroke-width="1.5" stroke-miterlimit="10"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                        <path opacity="0.4" d="M8.4707 10.7402L12.0007 14.2602L15.5307 10.7402"
                                                            stroke="#DC2626" stroke-width="1.5" stroke-linecap="round"
                                                            stroke-linejoin="round"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <h6 class="mb-0">This Month Orders</h6>
                                            </div>
                                        </div>
                                        <div class="bg-body p-3 mt-3 rounded">
                                            <div class="mt-3 row align-items-center">
                                                <div class="col-7">
                                                    <div id="download-graph"></div>
                                                </div>
                                                <div class="col-5">
                                                    <h5 class="mb-1">2,067</h5>
                                                    <p class="text-danger mb-0"><i class="ti ti-arrow-up-right"></i> 30.6%</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h5 class="mb-0">Monthly Revenue</h5>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="text-end my-2">5.44% <span class="badge bg-success">+2.6%</span> </h5>
                                        <div id="customer-rate-graph"></div>
                                    </div>
                                </div>
                            </div>
                       
                       
                        </div>
                    </div>
                </div>
            </div>
  
        </div>
    </div>
    </div>
@endsection
