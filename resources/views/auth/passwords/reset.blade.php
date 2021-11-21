@extends('layouts.auth')

@section('title', 'Reset Password')
@section('content')

    <p class="mrg-btm-15 font-size-13">Please enter your new password</p>

    <form method="POST" action="{{ route('password.update') }}">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="password" placeholder="New Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="password-confirm" placeholder="Confirm New Password" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
        <div class="mrg-top-20 text-right">
            <button type="submit" class="btn btn-success">
                {{ __('Reset Password') }}
            </button>
        </div>l
    </form>

@endsection
