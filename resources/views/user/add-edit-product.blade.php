@extends('layouts.user.app')

@section('content')
<style>
    .img-prod{
        height: 160px;

        object-fit: cover;
    }
</style>
    <div class="pc-container">
        <div class="pc-content">
            <!-- [ breadcrumb ] start -->
            <div class="page-header">
                <div class="page-block">
                    <div class="row align-items-center">
                        <div class="col-md-12">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Create/Edit Products</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <div class="page-header-title">
                                <h2 class="mb-0">Create/Edit Products</h2>
                            </div>

                        </div>

                       @livewire('user.add-edit-product', ['id' => $id])

                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
    
@endsection
