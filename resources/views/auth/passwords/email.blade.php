@extends('layouts.auth')

@section('title', 'Reset Password')
@section('content')

    <p class="mrg-btm-15 font-size-13">Already have an account?  <a href="{{ route('login') }}">
            {{ __('Sign In') }}
        </a> | <a href="{{ route('register') }}">
            {{ __('Create Account') }}
        </a></p>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="form-group">
            <input id="email" placeholder="Email Address" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="mrg-top-20">
            <button type="submit" class="btn btn-success">
                {{ __('Send Password Reset Link') }}
            </button>
        </div>
    </form>

@endsection
