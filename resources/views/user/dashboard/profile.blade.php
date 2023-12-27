@extends('frontend.layouts.master')

@section('content')
    <section id="dashboard">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('user.dashboard.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="dashboard_content">
                        <div class="my_listing">
                            <h4>basic information</h4>
                            <form method="POST" action="{{ route('user.profile.update') }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="my_listing_single">
                                            <label>Profile Avatar</label>
                                            <div id="image-preview-1" class="profile_pic_upload">
                                                <img id="preview1" src="#" alt="img" class="imf-fluid w-100"
                                                    style="display:none;">
                                                <input type="file" id="selectImage1" name="avatar">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-md-6">
                                        <div class="my_listing_single">
                                            <label>Profile Banner</label>
                                            <div id="image-preview-2" class="profile_pic_upload banner_pic_upload">
                                                <img id="preview2" src="#" alt="img" class="imf-fluid w-100"
                                                    style="display:none;">
                                                <input type="file" id="selectImage2" name="profile_banner">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-5 col-md-5">
                                        <div class="my_listing_single">
                                            <label>First Name</label>
                                            <div class="input_area">
                                                <input type="text" placeholder="First Name" name="first_name"
                                                    value="{{ $user->first_name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-md-5">
                                        <div class="my_listing_single">
                                            <label>Last Name</label>
                                            <div class="input_area">
                                                <input type="text" placeholder="Last Name" name="last_name"
                                                    value="{{ $user->last_name }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-7 col-md-7">
                                        <div class="my_listing_single">
                                            <label>email</label>
                                            <div class="input_area">
                                                <input type="Email" placeholder="Email" name="email"
                                                    value="{{ $user->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-md-3">
                                        <div class="my_listing_single">
                                            <label>Gender</label>
                                            <div class="input_area">
                                                <div class="wsus__search_area">
                                                    <select class="select_2" name="gender" required="">
                                                        <option disabled>Select gender</option>
                                                        <option value="male"
                                                            {{ $user->gender === 'male' ? ' selected ' : '' }}>
                                                            Male
                                                        </option>
                                                        <option value="female"
                                                            {{ $user->gender === 'female' ? ' selected ' : '' }}>
                                                            Female</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-5 col-md-5">
                                        <div class="my_listing_single">
                                            <label>phone</label>
                                            <div class="input_area">
                                                <input type="text" placeholder="1234...." name="phone"
                                                    value="{{ $user->phone }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-5 col-md-5">
                                        <div class="my_listing_single">
                                            <label>Website</label>
                                            <div class="input_area">
                                                <input type="text" placeholder="http://...." name="website"
                                                    value="{{ $user->website }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-10 col-md-10">
                                        <div class="my_listing_single">
                                            <label>address</label>
                                            <div class="input_area">
                                                <input type="text" placeholder="Address" name="address"
                                                    value="{{ $user->address }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-xl-10 col-md-10">
                                        <div class="my_listing_single">
                                            <label>About Me</label>
                                            <div class="input_area">
                                                <textarea cols="3" rows="3" placeholder="Your Text" name="bio">{{ $user->bio }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="medicine_row3">
                                    <div class="row">
                                        <div class="col-xl-5 col-md-5">
                                            <label for="name">icon</label>
                                            <div class="medicine_row_input">
                                                <input type="text" name="name[]" id="name">
                                            </div>
                                        </div>
                                        <div class="col-xl-5 col-md-5">
                                            <label for="name">link</label>
                                            <div class="medicine_row_input">
                                                <input type="text" name="name[]" id="name">
                                            </div>
                                        </div>
                                        <div class="col-xl-2 col-md-2">
                                            <div class="medicine_row_input">
                                                <button type="button" id="add_row3"><i class="fas fa-plus"
                                                        aria-hidden="true"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="read_btn">upload</button>
                                </div>
                            </form>
                        </div>
                        <div class="my_listing list_mar" style="background-color: cornsilk;">
                            <h4>change password</h4>
                            <form method="POST" action="{{ route('user.password.update') }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-xl-4 col-md-6">
                                        <div class="my_listing_single">
                                            <label>current password</label>
                                            <div class="input_area">
                                                <input type="password" placeholder="Current Password"
                                                    name="current_password">
                                                <div class="invalid-feedback">
                                                    Please fill in the current password
                                                </div>
                                                @php
                                                    if ($errors->has('current_password')) {
                                                        toastr()->error($errors->first('current_password'));
                                                    }
                                                @endphp
                                                @if ($errors->has('current_password'))
                                                    <div class="alert alert-danger">
                                                        {{ $errors->first('current_password') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6">
                                        <div class="my_listing_single">
                                            <label>new password</label>
                                            <div class="input_area">
                                                <input type="password" placeholder="New Password" name="password">
                                                <div class="invalid-feedback">
                                                    Please fill in the password
                                                </div>
                                                @php
                                                    if ($errors->has('password')) {
                                                        toastr()->error($errors->first('password'));
                                                    }
                                                @endphp
                                                @if ($errors->has('password'))
                                                    <div class="alert alert-danger">{{ $errors->first('password') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-4">
                                        <div class="my_listing_single">
                                            <label>confirm password</label>
                                            <div class="input_area">
                                                <input type="password" placeholder="Confirm Password"
                                                    name="password_confirmation">
                                                <div class="invalid-feedback">
                                                    Please fill in the password confirmation
                                                </div>
                                                @php
                                                    if ($errors->has('password_confirmation')) {
                                                        toastr()->error($errors->first('password_confirmation'));
                                                    }
                                                @endphp
                                                @if ($errors->has('password_confirmation'))
                                                    <div class="alert alert-danger">
                                                        {{ $errors->first('password_confirmation') }}</div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="read_btn">upload</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="my_listing list_mar">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            $('#image-preview-1').css({
                'background-image': 'url({{ asset($user->avatar) }})',
                'background-size': 'cover',
                'background-position': 'center center',
            });
            $('#image-preview-2').css({
                'background-image': 'url({{ asset($user->profile_banner) }})',
                'background-size': 'cover',
                'background-position': 'center center',
                // 'z-index': "-1",
            });
        });

        selectImage1.onchange = evt => {
            preview1 = document.getElementById('preview1');
            preview1.style.display = 'block';
            const [file] = selectImage1.files
            if (file) {
                preview1.src = URL.createObjectURL(file);
            }
        }

        selectImage2.onchange = evt => {
            preview2 = document.getElementById('preview2');
            preview2.style.display = 'block';
            const [file] = selectImage2.files
            if (file) {
                preview2.src = URL.createObjectURL(file)
            }
        }
    </script>
@endpush
