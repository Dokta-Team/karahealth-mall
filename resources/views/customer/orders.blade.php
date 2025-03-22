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
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Orders</li>
                    </ol>
                </nav>
            </div>
            <div class="order-md-1 text-center text-md-left col-lg col-12">
                <h1 class="h3 mb-0">Orders</h1>
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
                                <h5 class="mb-1 text-white">Orders Overview</h5>
                                <p class="mb-0 text-white small">
                                    You have full control to manage your own orders.
                                </p>
                            </div>
                            <div class="col-auto">
                                <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm"> <i class="ti-angle-left"></i> Go Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            @livewire('customer.order-manager')
                            {{-- <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Order #</th>
                                            <th>Date Purchased</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="py-3"><a class="nav-link-style fw-medium fs-sm" href="{{ route('customer.track-order', ['id' => '34VB5540K83']) }}" data-bs-toggle="modal">34VB5540K83</a></td>
                                            <td class="py-3">Dec 20, 2024</td>
                                            <td class="py-3"><span class="badge bg-soft-info m-0">In Progress</span></td>
                                            <td class="py-3">$358.75</td>
                                        </tr>
                                        
                                    </tbody>
                                </table>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection