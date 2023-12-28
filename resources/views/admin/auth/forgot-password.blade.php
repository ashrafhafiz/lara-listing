@extends('admin.auth.layouts.master')

@section('title')
    <title>Forgot Password &mdash; Lara Listing</title>
@endsection

@section('content')
    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="login-brand">
            <img src="{{ asset('assets/admin/img/stisla-fill.svg') }}" alt="logo" width="100"
                class="shadow-light rounded-circle">
        </div>

        <div class="card card-primary">
            <div class="card-header">
                <h4>Forgot Password</h4>
            </div>

            <div class="card-body">
                <p class="text-muted">We will send a link to reset your password</p>
                @if (session('status'))
                    <div class="alert alert-success">{{ session('status') }}</div>
                @endif
                <form method="POST" action="{{ route('admin.password.email') }}">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control" name="email" tabindex="1" required
                            autofocus>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                            Forgot Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="simple-footer">
            Copyright &copy; AHVLabs {{ date('Y') }}
        </div>
    </div>
@endsection
