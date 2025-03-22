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
                        <li class="breadcrumb-item text-nowrap active" aria-current="page">My Account</li>
                    </ol>
                </nav>
            </div>
            <div class="order-md-1 text-center text-md-left col-lg col-12">
                <h1 class="h3 mb-0">My Account</h1>
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
                                    Here you can view detailed of your profile and account.
                                </p>
                            </div>
                            <div class="col-auto">
                                <a href="{{ url()->previous() }}" class="btn btn-primary btn-sm"> <i class="ti-angle-left"></i> Go Back</a>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if(session('error'))
    <div class="alert alert-danger">{{ session('error') }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form class="row align-items-end" method="POST" action="{{ route('customer.update.details') }}">
    @csrf
    <div class="mb-3 col-12 col-md-12">
        <label class="form-label" for="name">Name</label>
        <input type="text" id="name" class="form-control" name="name" value="{{ old('name', auth()->user()->name) }}">
        @error('name') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3 col-12 col-md-6">
        <label class="form-label" for="phone">Phone</label>
        <input type="text" id="phone" class="form-control" name="phone" value="{{ old('phone', auth()->user()->phone) }}">
        @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="mb-3 col-12 col-md-6">
        <label class="form-label" for="email">Email</label>
        <input type="email" id="email" class="form-control" name="email" value="{{ old('email', auth()->user()->email) }}">
        @error('email') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="col-12 mb-3 text-lg-right">
        <button class="btn btn-primary" type="submit">Edit Details</button>
    </div>
</form>



<form method="POST" action="{{ route('customer.update.password') }}">
    @csrf
    <div class="row">
        <div class="col-lg-12">
            <div class="form-group mb-4">
                <label class="form-label">Old Password</label>
                <input required class="form-control" name="old_password" type="password">
                @error('old_password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group mb-4">
                <label class="form-label">New Password</label>
                <input required class="form-control" name="new_password" type="password">
                @error('new_password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-lg-6">
            <div class="form-group mb-4">
                <label class="form-label">Confirm Password</label>
                <input required class="form-control" name="confirm_password" type="password">
                @error('confirm_password') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>
    <div class="form-group text-right mb-0">
        <button type="submit" class="btn btn-primary btn-medium">Change Password</button>
    </div>
</form>

                            
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection