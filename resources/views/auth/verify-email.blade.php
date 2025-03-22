@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
<div class="d-flex justify-content-between align-items-end mb-4">
    <h3 class="mb-0"><b>Hi, Check Your Mail</b></h3><a href="javascritp:;" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="link-primary">Logout</a>
</div>

    <div class="mb-4">
        <p class="text-muted">Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.</p>
    </div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form class="d-inline" method="POST" action="{{ route('verification.send') }}">
        @csrf

        <div class="d-grid mt-4"><button type="submit" class="btn btn-primary">Resend Verification Email</button></div>
    

    </form>
</div>
</div>
</div>
</div>
@endsection
