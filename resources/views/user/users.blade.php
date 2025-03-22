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
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Users</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <div class="page-header-title">
                                <h2 class="mb-0">Users</h2>
                            </div>
                         
                        </div>

                        <div class="row mt-2">
                            <!-- [ sample-page ] start -->
                            <div class="col-sm-12">
                              
                                       @livewire('user.users')
                                   
                            </div>
                        </div>
                    </div>
                </div>
            </div>
  
        </div>
    </div>
    </div>
@endsection
