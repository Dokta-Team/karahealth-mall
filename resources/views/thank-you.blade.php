@extends('layouts.app')

@section('content')
<section class="pt-4">
    <div class="container">
        <div class="row align-items-center mt-0 mt-md-4">
            <div class="col-sm-6 mb-4 mb-lg-0">
                <div class="thank mb-3">
                    <span class="thank-title-top">Order placed</span>
                    <h2 class="thank-title text-dark ">Successfully</h2>
                    <p class="thank-desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. In, non.</p>
                </div>
                <a href="{{ route('customer.track-order', ['id' => '123']) }}" class="btn btn-primary btn-medium rounded">
                    <i class="ti-angle-left"></i> Track Your Order </a>
            </div>
            <div class="col-md-5 d-lg-block d-none offset-lg-1 text-md-center">
                <img class="img-fluid" src="assets/img/thank.png" alt="thank">
            </div>
        </div>
    </div>
</section>


@endsection
