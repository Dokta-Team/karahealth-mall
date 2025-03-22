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
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Products List</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <div class="page-header-title">
                                <h2 class="mb-0">Products List</h2>
                            </div>
                         
                        </div>

                        <div class="row mt-2">
                            <!-- [ sample-page ] start -->
                            <div class="col-sm-12">
                                <div class="card table-card">
                                    <div class="card-body">
                                        <div class="text-end p-4 pb-sm-2">
                                            <a href="{{ route('user.add-product') }}"
                                                class="btn btn-primary d-inline-flex align-items-center gap-2"><i
                                                    class="ti ti-plus f-18"></i> Add Product</a>
                                        </div>
                                       @livewire('user.products')
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
