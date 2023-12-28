{{-- <x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block w-full mt-1"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}

@extends('frontend.layouts.master')

@section('content')
    <!--==========================
                                                                                                                BREADCRUMB PART START
                                                                                                            ===========================-->
    <div id="breadcrumb_part">
        <div class="bread_overlay">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="text-center text-white col-12">
                        <h4>sign up</h4>
                        <nav style="--bs-breadcrumb-divider: '';" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="/"> Home </a></li>
                                <li class="breadcrumb-item active" aria-current="page"> sign up </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--==========================
                                                                                                                BREADCRUMB PART END
                                                                                                            ===========================-->


    <!--=========================
                                                                                                                SIGN IN START
                                                                                                            ==========================-->
    <section class="wsus__login_page">
        <div class="container">
            <div class="row">
                <div class="m-auto col-xl-8 col-md-9 col-lg-8">
                    <div class="wsus__login_area">
                        <h2>Welcome back!</h2>
                        <p>sign up to continue</p>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="wsus__login_imput">
                                        <label>First Name</label>
                                        <input type="text" placeholder="First Name" name="first_name"
                                            value="{{ old('first_name') }}" required autofocus autocomplete="first_name">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="wsus__login_imput">
                                        <label>Last Name</label>
                                        <input type="text" placeholder="Last Name" name="last_name"
                                            value="{{ old('last_name') }}" required autofocus autocomplete="last_name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-8">
                                    <div class="wsus__login_imput">
                                        <label>email</label>
                                        <input type="email" placeholder="Email" name="email" value="{{ old('email') }}"
                                            required autocomplete="username">
                                    </div>
                                </div>
                                <div class="col-xl-4">
                                    <div class="wsus__login_imput">
                                        <label>Gender</label>
                                        <div class="input_area">
                                            <div class="wsus__search_area">
                                                <select class="select_2" name="gender" required="">
                                                    <option>Select gender</option>
                                                    <option value="male">Male</option>
                                                    <option value="female">Female</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="wsus__login_imput">
                                        <label>password</label>
                                        <input type="password" placeholder="Password" name="password" required
                                            autocomplete="new-password">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="wsus__login_imput">
                                        <label>confirm password</label>
                                        <input type="password" placeholder="Confirm Password" name="password_confirmation"
                                            required autocomplete="new-password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="wsus__login_imput">
                                        <button type="submit" class="common_btn">registration</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <p class="or"><span>or</span></p>
                        <ul class="d-flex">
                            <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                            <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fab fa-google-plus-g"></i></a></li>
                        </ul>
                        <p class="create_account">Dont’t have an aceount ? <a href="{{ route('login') }}">login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--=========================
                                                                                                                SIGN IN END
                                                                                                            ==========================-->
    SIGN IN END
    ==========================-->
@endsection
