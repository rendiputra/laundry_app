@extends('layouts.app')

@section('title', 'Login')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
                <img src="https://ui-avatars.com/api/?name={{ config('app.name') }}&background=fff&color=6777ef&size=100"
                    alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            @if (session('status'))
            <div class="alert alert-info alert-dismissible show fade">
                <div class="alert-body">
                    <button class="close" data-dismiss="alert">
                        <span>×</span>
                    </button>
                    {{ session('status') }}
                </div>
            </div>
            @endif

            <div class="card card-primary">
                <div class="card-header">
                    <h4>Login</h4>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">{{ __('Email') }}</label>
                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" autofocus tabindex="1"/>
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="d-block">
                                <label for="password" class="control-label">{{ __('Password') }}</label>
                                <div class="float-right">
                                    @if (Route::has('password.request'))
                                    <a href="{{ route('password.request') }}" class="text-small">
                                        Forgot Password?
                                    </a>
                                    @endif
                                </div>
                            </div>
                            <input type="password" name="password"
                                class="form-control @error('password') is-invalid @enderror"
                                autocomplete="current-password" tabindex="2" />
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                    id="remember-me" {{ old('remember') ? 'checked' : '' }}>
                                <label class="custom-control-label" for="remember-me">Remember Me</label>
                            </div>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </form>

                </div>
            </div>
            <div class="mt-3 text-muted text-center">
                Don't have an account? <a href="{{ route('register') }}">Create One</a>
            </div>
            <div class="simple-footer">
                Copyright ©2021
            </div>
        </div>
    </div>
</div>
@endsection