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
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Order #id</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <div class="page-header-title">
                                <h2 class="mb-0">Order #id</h2>
                            </div>

                        </div>

                        <div class="row mt-2">
                   
                                        <div class="col-xl-8">
                                            <div class="card">
                                                
                                                <div class="card-body border-bottom">
                                                    <h5>John Doe</h5>
                                                    <span>Test@gmail.com</span> <br>
                                                    <span>+123456789</span> <br>
                                                    <span>1234 Elm Street, Springfield, Illinois, 62704, United States</span>
                                                </div>
                                                <div class="card-body p-0 table-body">
                                                    <div class="table-responsive">
                                                        <table class="table mb-0" id="pc-dt-simple">
                                                            <thead>
                                                                <tr>
                                                                    <th>Product</th>
                                                                    <th class="text-end">Price</th>
                                                                    <th class="text-center">Quantity</th>
                                                                    <th class="text-end">Total</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <div class="d-flex align-items-center"><img
                                                                                src="../assets/images/application/img-prod-2.jpg"
                                                                                alt="image"
                                                                                class="bg-light wid-50 rounded">
                                                                            <div class="flex-grow-1 ms-3">
                                                                                <h5 class="mb-1">Apple MacBook Pro</h5>
                                                                                <p class="text-sm text-muted mb-0">Dark Red
                                                                                </p>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                    <td class="text-end">
                                                                        <h5 class="mb-0">$100.00</h5><span
                                                                            class="text-sm text-muted text-decoration-line-through">$129.99</span>
                                                                    </td>
                                                                    <td class="text-center">
                                                                       10
                                                                    </td>
                                                                    <td class="text-end">
                                                                        <h5 class="mb-0">$100.00</h5>
                                                                    </td>
                                                                  
                                                                </tr>
                                                               
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                     
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="card">
                                                <div class="card-body"><button type="button"
                                                        class="btn btn-sm btn-link-secondary" data-bs-toggle="modal"
                                                        data-bs-target="#couponModal">Change Order Status</button>
                                                    <div class="input-group my-2">
                                                      
                                                            <select name="" id="" class="form-control" >
                                                                <option value="Pending">Pending</option>
                                                                <option value="Delivered">Delivered</option>
                                                                <option value="Canceled">Canceled</option>

                                                            </select>
                                                            <button class="btn btn-outline-secondary" type="button">Change</button></div>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body py-2">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item px-0">
                                                            <h5 class="mb-0">Order Summary</h5>
                                                        </li>
                                                        <li class="list-group-item px-0">
                                                            <div class="float-end">
                                                                <h5 class="mb-0">$300.00</h5>
                                                            </div><span class="text-muted">Sub Total</span>
                                                        </li>
                                                        <li class="list-group-item px-0">
                                                            <div class="float-end">
                                                                <h5 class="mb-0">-</h5>
                                                            </div><span class="text-muted">Estimated Delivery</span>
                                                        </li>
                                                     
                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="card">
                                                <div class="card-body py-2">
                                                    <ul class="list-group list-group-flush">
                                                        <li class="list-group-item px-0">
                                                            <div class="float-end">
                                                                <h5 class="mb-0">$300.00</h5>
                                                            </div>
                                                            <h5 class="mb-0 d-inline-block">Total</h5>
                                                        </li>
                                                    </ul>
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
