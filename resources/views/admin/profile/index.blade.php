@extends('admin.dashboard.layouts.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Profile</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item">Profile</div>
                </div>
            </div>
            <div class="section-body">
                <h2 class="section-title">Hi, {{ $user->name }}!</h2>
                <p class="section-lead">
                    Change information about yourself on this page.
                </p>

                <div class="row mt-sm-4">
                    <div class="col-12 col-md-12 col-lg-5">
                        <div class="card profile-widget">
                            <div class="profile-widget-header">
                                <img alt="image" src="{{ $user->avatar }}" class="rounded-circle profile-widget-picture">
                                <div class="profile-widget-items">
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Posts</div>
                                        <div class="profile-widget-item-value">187</div>
                                    </div>
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Followers</div>
                                        <div class="profile-widget-item-value">6,8K</div>
                                    </div>
                                    <div class="profile-widget-item">
                                        <div class="profile-widget-item-label">Following</div>
                                        <div class="profile-widget-item-value">2,1K</div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-widget-description">
                                <div class="profile-widget-name">{{ $user->name }} <div
                                        class="text-muted d-inline font-weight-normal">
                                        <div class="slash"></div> Web Developer
                                    </div>
                                </div>
                                {{ $user->bio }}
                            </div>
                            <div class="text-center card-footer">
                                <div class="mb-2 font-weight-bold">Follow {{ $user->name }} On</div>
                                @foreach ($user->social_media_subscriptions as $sms)
                                    <a href="{{ $sms->social_media_link }}"
                                        class="mr-1 btn btn-social-icon btn-{{ $sms->social_media_type }}">
                                        <i class="fab fa-{{ $sms->social_media_type }}"></i>
                                    </a>
                                @endforeach

                                {{-- <a href="#" class="mr-1 btn btn-social-icon btn-twitter">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="#" class="mr-1 btn btn-social-icon btn-github">
                                    <i class="fab fa-github"></i>
                                </a>
                                <a href="#" class="btn btn-social-icon btn-instagram">
                                    <i class="fab fa-instagram"></i>
                                </a> --}}
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-lg-7">
                        <div class="card">
                            <form method="post" action="{{ route('admin.profile.store') }}" class="needs-validation"
                                novalidate="">
                                @csrf
                                <div class="card-header">
                                    <h4>Edit Profile</h4>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4 form-group row">
                                        <div class="col-sm-12 col-md-6">
                                            <label class="col-form-label">Profile Photo</label>
                                            <div id="image-preview-1" class="image-preview">
                                                <label for="image-upload-1" id="image-label-1">Choose File</label>
                                                <input type="file" name="image" id="image-upload-1" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label class="col-form-label">Profile Banner</label>
                                            <div id="image-preview-2" class="image-preview">
                                                <label for="image-upload-2" id="image-label-2">Choose File</label>
                                                <input type="file" name="image" id="image-upload-2" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>First Name</label>
                                            <input type="text" class="form-control" value="{{ $user->first_name }}"
                                                name="first_name" required="">
                                            <div class="invalid-feedback">
                                                Please fill in the first name
                                            </div>
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Last Name</label>
                                            <input type="text" class="form-control" value="{{ $user->last_name }}"
                                                name="last_name" required="">
                                            <div class="invalid-feedback">
                                                Please fill in the last name
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-7 col-12">
                                            <label>Email</label>
                                            <input type="email" class="form-control" value="{{ $user->email }}"
                                                name="email" required="">
                                            <div class="invalid-feedback">
                                                Please fill in the email
                                            </div>
                                        </div>
                                        <div class="form-group col-md-5 col-12">
                                            <label>Gender</label>
                                            <select class="form-control" name="gender" required="">
                                                <option disabled>Select gender</option>
                                                <option value="male"
                                                    {{ $user->gender === 'male' ? ' selected="selected"' : '' }}>
                                                    Male
                                                </option>
                                                <option value="female"
                                                    {{ $user->gender === 'female' ? ' selected="selected"' : '' }}>
                                                    Female</option>
                                            </select>

                                            <div class="invalid-feedback">
                                                Please fill in the gender
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-md-6 col-12">
                                            <label>Phone</label>
                                            <input type="tel" class="form-control" value="{{ $user->phone }}"
                                                name="phone">
                                            {{-- <div class="invalid-feedback">
                                                Please fill in the phone number
                                            </div> --}}
                                        </div>
                                        <div class="form-group col-md-6 col-12">
                                            <label>Website</label>
                                            <input type="text" class="form-control" value="{{ $user->website }}"
                                                name="website">
                                            {{-- <div class="invalid-feedback">
                                                Please fill in the website link
                                            </div> --}}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Address</label>
                                            <input type="text" class="form-control" value="{{ $user->address }}"
                                                name="address">
                                            {{-- <div class="invalid-feedback">
                                                Please fill in the address
                                            </div> --}}
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-12">
                                            <label>Bio</label>
                                            <textarea class="form-control summernote-simple" name="bio">{{ $user->bio }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="mb-0 form-group col-12">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" name="remember" class="custom-control-input"
                                                    id="newsletter">
                                                <label class="custom-control-label" for="newsletter">Subscribe to
                                                    newsletter</label>
                                                <div class="text-muted form-text">
                                                    You will get new information about products, offers and promotions
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-right card-footer">
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script>
        $.uploadPreview({
            input_field: "#image-upload-1", // Default: .image-upload
            preview_box: "#image-preview-1", // Default: .image-preview
            label_field: "#image-label-1", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null, // Default: null
        });

        $.uploadPreview({
            input_field: "#image-upload-2", // Default: .image-upload
            preview_box: "#image-preview-2", // Default: .image-preview
            label_field: "#image-label-2", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null, // Default: null
        });
    </script>
@endpush
