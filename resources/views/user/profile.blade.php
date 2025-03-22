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
                                <li class="breadcrumb-item"><a href="javascript: void(0)">Profile</a></li>
                            </ul>
                        </div>
                        <div class="col-md-12">
                            <div class="page-header-title">
                                <h2 class="mb-0">Good Evening, {{ auth()->user()->name }}!</h2>
                                <p>Let us know your name and email address. Use an address you don't mind other users
                                    contacting you at
                                </p>
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    @if (session('success'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('success') }}
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    @if ($errors->any())
                                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                            <ul class="mb-0">
                                                @foreach ($errors->all() as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                aria-label="Close"></button>
                                        </div>
                                    @endif

                                    <!-- END: Define your progress bar here --><!-- START: Define your tab pans here -->
                                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                        <div class="row mt-4">
                                            <div class="col-sm-auto text-center">
                                                <div class="position-relative me-3 d-inline-flex">
                                                    <div class="user-upload wid-150"><img
                                                        src="{{ asset('uploads/users/' . auth()->user()->profile_image) }}" alt="img"
                                                        class="wid-150 rounded img-fluid ms-2"> <label for="uplfile" class="img-avtar-upload"><i
                                                            class="ti ti-camera f-24 mb-1"></i>
                                                        <span>Upload</span></label> <input type="file" name="profile_image"
                                                        id="uplfile" class="d-none">
                                                </div>
                                                    {{-- <div class="position-absolute top-50 start-100 translate-middle">
                                                        <button class="btn btn-sm btn-primary btn-icon"><i
                                                                class="ti ti-pencil"></i></button>
                                                    </div><img src="{{ asset('uploads/' . auth()->user()->profile_image) }}"
                                                        alt="user-image" class="wid-150 rounded img-fluid ms-2"> --}}
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label class="form-label">Full Name</label>
                                                            <input type="text"
                                                                value="{{ old('name') ?? auth()->user()->name }}"
                                                                name="name"
                                                                class="form-control" placeholder="Enter First Name">
                                                        </div>
                                                    </div>

                                                    <div class="col-sm-6">
                                                        <div class="mb-3"><label class="form-label">Email
                                                                Address</label> <input type="email" class="form-control"
                                                                name="email"
                                                                value="{{ old('email') ?? auth()->user()->email }}"
                                                                placeholder="Enter Email Address"></div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="mb-3"><label class="form-label">Phone Number</label>
                                                            <input type="number" class="form-control"
                                                            name="phone"
                                                                value="{{ old('phone') ?? auth()->user()->phone }}"
                                                                placeholder="Enter Phone Number">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @if(auth()->user()->role->name != 'admin')
                                                <div class="col-md-12">
                                                    <div class="mb-3"><label class="form-label">Address 1</label>
                                                        <input type="text" class="form-control"
                                                        name="address_1"
                                                            value="{{ old('address_1') ?? auth()->user()->address_1 }}"
                                                            placeholder="Enter Address 1">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3"><label class="form-label">Address 2</label>
                                                        <input type="text" class="form-control"
                                                        name="address_2"
                                                            value="{{ old('address_2') ?? auth()->user()->address_2 }}"
                                                            placeholder="Enter Address 2">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3"><label class="form-label">Area/Region</label>
                                                        <input type="text" class="form-control"
                                                        name="area_region"
                                                            value="{{ old('area_region') ?? auth()->user()->area_region }}"
                                                            placeholder="Enter Area/Region">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="mb-3"><label class="form-label">State</label> <input
                                                            type="text" class="form-control"
                                                            name="state"

                                                            value="{{ old('state') ?? auth()->user()->state }}"
                                                            placeholder="Enter State"></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3"><label class="form-label">Country</label>
                                                        <select class="form-select" name="state" >
                                                            <option value="">Select Contry</option>
                                                            <option
                                                                {{ (old('state') ?? auth()->user()->state) == 'India' ? 'selected' : '' }}
                                                                value="">USA</option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="mb-3"><label class="form-label"
                                                            for="type_classification">Type/Classifications</label> <input type="text"
                                                            name="type_classification"
                                                            class="form-control" id="type_classification"
                                                            placeholder="Enter your Type/Classifications"></div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-3"><label class="form-label"
                                                            for="documents">Documents (Multiple)</label>
                                                            @if(auth()->user()->documents)
                                                            <br>
                                                            <span>Already Uploaded (<small>Uploading New will replace old docuemnts</small>) :
                                                                <ul>
                                                                    @foreach(json_decode(auth()->user()->documents, true) ?? [] as $document)
                                                                        <li>
                                                                            <a href="{{ asset('uploads/documents/' . auth()->user()->id . '/' . $document) }}" target="_blank">
                                                                                {{ $document }}
                                                                            </a>
                                                                        </li>
                                                                    @endforeach
                                                                </ul>
                                                                
                                                            </span>
                                                            @endif

                                                            <input type="file" multiple
                                                            name="documents[]"
                                                            class="form-control" id="documents"
                                                            placeholder="Add Documents">
                                                        </div>
                                                </div>
                                                @if(auth()->user()->role->name != 'person')

                                                <div class="col-md-4">
                                                    <div class="mb-3"><label class="form-label"
                                                            for="contact_person">Contact Person</label> <input type="text"
                                                            class="form-control" id="contact_person"
                                                            name="contact_person"
                                                            value="{{ old('contact_person') ?? auth()->user()->contact_person }}"
                                                            placeholder="Enter Contact Person"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3"><label class="form-label"
                                                            for="website">Website</label> <input type="text"
                                                            class="form-control" id="website"
                                                            name="website"
                                                            value="{{ old('website') ?? auth()->user()->website }}"
                                                            placeholder="Enter You Website"></div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="mb-3"><label class="form-label"
                                                            for="coordinates">Coordinates </label> <input type="text"
                                                            class="form-control" id="coordinates"
                                                            name="coordinates"
                                                            value="{{ old('coordinates') ?? auth()->user()->coordinates }}"
                                                            placeholder="Ender Your Coordinates"></div>
                                                </div>
                                                @endif
                                            @endif
                                        </div><!-- end contact detail tab pane -->

                                        <!-- END: Define your tab pans here --><!-- START: Define your controller buttons here-->
                                        <div class="d-flex wizard justify-content-end flex-wrap gap-2 mt-3">

                                            <button type="submit" class="btn btn-secondary">Update Profile</button>
                                        </div>
                                    </form>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
