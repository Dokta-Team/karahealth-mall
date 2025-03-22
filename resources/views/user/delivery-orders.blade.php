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
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Orders</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <div class="page-header-title">
                                <h2 class="mb-0">Orders</h2>
                            </div>

                        </div>

                        <div class="row mt-2">
                            <!-- [ sample-page ] start -->
                            <div class="col-sm-12">
                                <div class="card table-card">
                                    <div class="card-body">

                                        <div class="table-responsive">
                                            <table class="table table-hover" id="pc-dt-simple">
                                                <thead>
                                                    <tr>
                                                        <th class="text-end">Order #</th>
                                                        <th>User Detail</th>
                                                        <th>Products</th>
                                                        <th class="text-end">Price</th>
                                                        <th class="text-end">Qty</th>
                                                        <th>Status</th>
                                                        <th class="text-center">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td class="text-end">7</td>
                                                        <td>
                                                            <div class="d-flex align-items-center"><img
                                                                    src="../assets/images/application/img-prod-2.jpg"
                                                                    alt="image" class="bg-light wid-50 rounded">
                                                                <div class="flex-grow-1 ms-3">
                                                                    <h5 class="mb-1">John Doe</h5>
                                                                    <p class="text-sm text-muted mb-0">1234 Elm Street, Springfield, Illinois, 62704, United States</p>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td><button class="btn btn-primary btn-sm text-sm">View</button>
                                                        </td>
                                                        <td class="text-end">$14.59</td>
                                                        <td class="text-end">70</td>
                                                        <td>
                                                            <span class="badge bg-light-success f-12">Delviered</span>
                                                        </td>
                                                        <td class="text-center">
                                                            <ul class="list-inline me-auto mb-0">
                                                                <li class="list-inline-item align-bottom"
                                                                    data-bs-toggle="tooltip" title="View">
                                                                    <a href="{{ route('user.view-order', ['id' => '1']) }}"
                                                                        class="avtar avtar-xs btn-link-secondary btn-pc-default"
                                                                       ><i
                                                                            class="ti ti-eye f-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item align-bottom"
                                                                    data-bs-toggle="tooltip" title="Edit">
                                                                    <a href="{{ route('user.edit-order', ['id' => '1']) }}"
                                                                        class="avtar avtar-xs btn-link-success btn-pc-default"><i
                                                                            class="ti ti-edit-circle f-18"></i></a>
                                                                </li>
                                                                <li class="list-inline-item align-bottom"
                                                                    data-bs-toggle="tooltip" title="Delete">
                                                                    <a href="#"
                                                                        class="avtar avtar-xs btn-link-danger btn-pc-default"><i
                                                                            class="ti ti-trash f-18"></i></a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- [ sample-page ] end -->
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
