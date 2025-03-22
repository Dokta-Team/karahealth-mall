@extends('layouts.app')

@section('content')
<div class="accounnt_header">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-auto col-12 order-md-2">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item">
                            <a class="text-nowrap" href="{{ route('customer.dashboard') }}"><i class="fa fa-home mr-2"></i>Home</a>
                        </li>
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>
            </div>
            <div class="order-md-1 text-center text-md-left col-lg col-12">
                <h1 class="h3 mb-0">Dashboard</h1>
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
                                <h5 class="mb-1 text-white">Account Overview</h5>
                                <p class="mb-0 text-white small">
                                    Here you can see all the analytiscs of your account
                                </p>
                            </div>
                            
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div>
                           
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection