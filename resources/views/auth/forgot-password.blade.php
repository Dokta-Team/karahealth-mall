@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
    <div class="d-flex justify-content-between align-items-end mb-4">
        <h3 class="h4 mb-0"><b>Forgot Password</b></h3><a href="{{ route('login') }}" class="link-primary">Back to Login</a>
    </div>
    
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf



        <div class="mb-3">
            <label class="form-label">Email Address</label>
            <input id="email" type="email" placeholder="Email Address"
                class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}"
                required autocomplete="email" autofocus>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <p class="mt-4 text-sm text-muted">Do not forgot to check SPAM folder.</p>

        <div class="d-grid mt-4"><button type="submit" class="btn btn-primary">Send Password Reset Email</button></div>


    </form>
</div>
</div>
</div>
</div>
@endsection
