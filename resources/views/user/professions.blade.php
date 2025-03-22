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
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Professions</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0)">{{ $category->name }}</a></li>

                            </ul>
                        </div>
                        <div class="col-md-12 d-flex justify-content-between align-items-center">
                            <div class="page-header-title">
                                <h2 class="mb-0">{{ $category->name }} Professions</h2>
                            </div>
                         
                        </div>

                        <div class="row mt-4">
                            <!-- [ sample-page ] start -->
                            <div class="col-sm-12">
                                <div class="card table-card">
                                    <div class="card-body">
                                        {{-- <div class="text-end p-4 pb-sm-2">
                                            <a href="{{ route('user.add-profession', ['category' => $category->slug]) }}"
                                                class="btn btn-primary d-inline-flex align-items-center gap-2"><i
                                                    class="ti ti-plus f-18"></i> Add Professions</a>
                                        </div> --}}
                                       @livewire('user.professions', ['category' => $category])
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
