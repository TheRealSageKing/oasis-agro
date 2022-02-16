@extends('layouts.auth')

@section('title', 'Log In')
@section('content')

    <p class="mrg-btm-15 font-size-13">Dont have an account? <a href="{{ route('register') }}">
            {{ __('Create Account') }}
        </a></p>
    @if (session('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="form-group">
            <input id="email" type="email" placeholder="Email Address" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="form-group">
            <input id="password" type="password" placeholder="Password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

            @error('password')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
        <div class="checkbox font-size-13 inline-block no-mrg-vertical no-pdd-vertical">
            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
            <label for="remember">
                {{ __('Keep Me Signed In') }}
            </label>
        </div>
        <div class="pull-right">
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}">
                    {{ __('Reset Password?') }}
                </a>
            @endif
        </div>
        <div class="mrg-top-20 text-right">
            <button type="submit" class="btn btn-success">
                {{ __('Login') }}
            </button>
        </div>
    </form>

@endsection
