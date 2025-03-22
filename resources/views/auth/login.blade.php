@extends('layouts.app')

@section('content')

        <div class="row justify-content-center">
            <div class="col-md-6">
                    <div class="card mt-5">
                        <div class="card-body">
    <h4 class="h4 text-center f-w-500 mb-3">Login with your email</h4>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('login') }}">
        @csrf



        <div class="mb-3"> <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                name="email" value="{{ old('email') }}" placeholder="Email Address" required autocomplete="email" autofocus>
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class=" mb-3">

            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                name="password" placeholder="Password" required autocomplete="current-password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="d-flex mt-1 justify-content-between align-items-center">
            <div class="form-check"><input class="form-check-input input-primary" type="checkbox" name="remember"
                    id="remember" checked=""> <label class="form-check-label text-muted" for="remember">Remember
                    me?</label>
            </div>
            <h6 class="text-secondary f-w-400 mb-0"><a  class="link-primary" href="{{ route('password.request') }}">Forgot Password?</a></h6>
        </div>

        <div class="d-grid mt-4"><button type="submit" class="btn btn-primary">Login</button></div>
        <div class="d-flex justify-content-between align-items-end mt-4">
            <h6 class="f-w-500 mb-0">Don't have an Account?</h6><a href="{{ route('register') }}" class="link-primary">Create
                Account</a>
        </div>

    </form>
</div>
</div>
</div>
</div>
@endsection
