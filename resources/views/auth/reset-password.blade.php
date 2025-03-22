@extends('layouts.app')

@section('content')


<div class="row justify-content-center">
    <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">
<div class="mb-4"><h3 class="mb-2 h4"><b>Reset Password</b></h3><p class="text-muted">Please choose your new password</p></div>
    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">


        <div class="mb-3">
            <label class="form-label">Email Address</label>
                <input id="email" placeholder="Confirm Email Adress" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $request->email) }}" required autocomplete="email" autofocus>

                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class=" mb-3">
            <label class="form-label">Password</label>
                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
        </div>

        <div class=" mb-3">
            <label class="form-label">Confirm Password</label>
                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>

     

        <div class="d-grid mt-4"><button type="submit" class="btn btn-primary">Reset Password</button></div>


    </form>
</div>
</div>
</div>
</div>
@endsection
