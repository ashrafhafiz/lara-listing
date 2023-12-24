@extends('admin.auth.layouts.master')

@section('title')
    <title>Login &mdash; Lara Listing</title>
@endsection

@section('content')
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="login-brand">
            <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>{{ __('Login') }}</h4>
            </div>

            <div class="card-body">
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
                    @csrf
                    <div class="form-group">
                        <label for="email">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-control" name="email" tabindex="1" required
                            autofocus>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        <div class="invalid-feedback">
                            {{ __('Please fill in your email') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="d-block">
                            <label for="password" class="control-label">{{ __('Password') }}</label>
                            <div class="float-right">
                                @if (Route::has('admin.password.request'))
                                    <a href="{{ route('admin.password.request') }}" class="text-small">
                                        {{ __('Forgot Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                        <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        <div class="invalid-feedback">
                            {{ __('please fill in your password') }}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="remember" class="custom-control-input" tabindex="3"
                                id="remember_me">
                            <label class="custom-control-label" for="remember_me">{{ __('Remember Me') }}</label>
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            {{ __('Login') }}
                        </button>
                    </div>
                </form>
                <div class="text-center mt-4 mb-3">
                    <div class="text-job text-muted">{{ __('Login With Social') }}</div>
                </div>
                <div class="row sm-gutters">
                    <div class="col-6">
                        <a class="btn btn-block btn-social btn-facebook">
                            <span class="fab fa-facebook"></span> {{ __('Facebook') }}
                        </a>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-block btn-social btn-twitter">
                            <span class="fab fa-twitter"></span> {{ __('Twitter') }}
                        </a>
                    </div>
                </div>

            </div>
        </div>
        {{-- <div class="mt-5 text-muted text-center">
                            Don't have an account? <a href="auth-register.html">Create One</a>
                        </div> --}}
        <div class="simple-footer">
            Copyright &copy; AHVLabs {{ date('Y') }}
        </div>
    </div>
@endsection
