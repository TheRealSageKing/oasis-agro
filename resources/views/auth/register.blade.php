@extends('layouts.auth')

@section('content')
    <div class="sign-in-2">
        <div class="container-fluid no-pdd-horizon bg" style="background-image: url('assets/images/others/img-30.jpg')">
            <div class="row">
                <div class="col-md-10 mr-auto ml-auto">
                    <div class="row">
                        <div class="mr-auto ml-auto full-height height-100 d-flex align-items-center">
                            <div class="vertical-align full-height">
                                <div class="table-cell">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="pdd-horizon-30 pdd-vertical-30">
                                                <div class="mrg-btm-30">
                                                    <img class="img-responsive inline-block" src="assets/images/logo/logo.png" alt="">
                                                    <h2 class="inline-block pull-right no-mrg-vertical pdd-top-15">Register</h2>
                                                </div>
                                                <p class="mrg-btm-15 font-size-13">Already have an account?  <a href="{{ route('login') }}">
                                                        {{ __('Sign In') }}
                                                    </a></p>

                                                <form method="POST" action="{{ route('register') }}">
                                                    @csrf

                                                    <div class="form-group">
                                                        <input id="name" placeholder="Full Name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input id="email" placeholder="Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input id="password-confirm" placeholder="Confirm Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                    </div>
                                                    <div class="checkbox font-size-13 inline-block no-mrg-vertical no-pdd-vertical">
                                                        <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                                        <label for="remember">
                                                            {{ __('I accept terms and condition') }}
                                                        </label>
                                                    </div>
                                                    <div class="mrg-top-20 text-right">
                                                        <button type="submit" class="btn btn-info">
                                                            {{ __('Register') }}
                                                        </button>
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
            </div>
        </div>
    </div>
@endsection
