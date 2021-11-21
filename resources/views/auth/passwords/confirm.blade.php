@extends('layouts.auth')

@section('title', 'Log In')
@section('content')

    <p class="mrg-btm-15 font-size-13">{{ __('Please confirm your password before continuing.') }}</p>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div class="form-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="pull-right">
            @if (Route::has('password.request'))
                <a class="btn btn-link" href="{{ route('password.request') }}">
                    {{ __('Forgot Your Password?') }}
                </a>
            @endif
        </div>
        <div class="mrg-top-20 text-right">
            <button type="submit" class="btn btn-primary">
                {{ __('Confirm Password') }}
            </button>
        </div>
    </form>

@endsection
