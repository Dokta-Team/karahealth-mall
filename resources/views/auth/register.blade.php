@extends('layouts.app')

@section('content')


    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card mt-5">
                <div class="card-body">

                    <h4 class="h4 text-center mb-3">Become a Member!
                    </h4>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('register') }}">
                        @csrf


                        <div class=" mb-3">

                            <select name="role" id="role" class="form-control @error('role') is-invalid @enderror"  placeholder="Full Name" >
                                <option value="">Select Your Role</option>
                                <option value="customer">Customer</option>
                                <option value="vendor">Shop or Company</option>
                                <option value="person">Person or Professional</option>

                            </select>
                            @error('role')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          
                        </div>

                        <div class=" mb-3">

                            <input id="name" type="text" wire:model="name" placeholder="Full Name"
                                class="form-control @error('name') is-invalid @enderror" name="name"
                                value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>


                        <div class=" mb-3">

                            <input id="email" type="text" wire:model="email" placeholder="Email Address"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                value="{{ old('email') }}" required autocomplete="email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class=" mb-3">

                            <input id="password" type="password" wire:model="password" placeholder="Password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="new-password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class=" mb-3">

                            <input id="password-confirm" wire:model="password_confirmation" type="password"
                                placeholder="Confirm Password" class="form-control" name="password_confirmation" required>
                        </div>


                        <div class="d-flex mt-1 justify-content-between">
                            <div class="form-check"><input name="terms" class="form-check-input input-primary"
                                    type="checkbox" id="terms"> <label class="form-check-label text-muted"
                                    for="terms">I agree to all the
                                    Terms
                                    &amp; Conditions</label></div>

                        </div>
                        @error('terms')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        <div class="d-grid mt-4"><button type="submit" class="btn btn-primary">Sign up</button></div>
                        <div class="d-flex justify-content-between align-items-end mt-4">
                            <h6 class="f-w-500 mb-0">Already have an Account?</h6><a href="{{ route('login') }}"
                                class="link-primary">Login
                                here</a>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
