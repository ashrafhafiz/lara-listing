@extends('admin.dashboard.layouts.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admin.listing.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Create listing</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admin.listing.index') }}">All Listings</a></div>
                    <div class="breadcrumb-item">Create Listing</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form method="POST" action="{{ route('admin.listing.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header">
                                    <h4>Create a New Listing</h4>
                                    <div class="card-header-action">
                                        <a href="{{ route('admin.listing.index') }}" class="btn btn-primary">Cancel</a>
                                    </div>
                                </div>
                                <div class="card-body">

                                    <div class="mb-4 form-group row">
                                        <div class="col-sm-12 col-md-6">
                                            <label for="image" class="col-form-label">Image</label>
                                            <div id="image-preview" class="image-preview">
                                                <label for="image-upload" id="image-label">Choose File</label>
                                                <input type="file" name="image" id="image-upload" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label for="thumbnail" class="col-form-label">Thumbnail Image</label>
                                            <div id="thumbnail-preview" class="image-preview">
                                                <label for="thumbnail-upload" id="thumbnail-label">Choose File</label>
                                                <input type="file" name="thumbnail" id="thumbnail-upload" />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4 form-group row">
                                        <div class="col-sm-12 col-md-6">
                                            <label for="title" class="col-form-label">Title</label>
                                            <input id="title" type="text" class="form-control"
                                                placeholder="Listing Title..." name="title" value={{ old('title') }}>
                                            <div class="invalid-feedback">
                                                Please fill in the listing title
                                            </div>
                                            @if ($errors->has('title'))
                                                <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label for="slug" class="col-form-label">Slug</label>
                                            <input id="slug" type="text" class="form-control" readonly
                                                placeholder="Listing Slug..." name="slug" value={{ old('slug') }}>
                                        </div>
                                    </div>

                                    <div class="mb-4 form-group row">
                                        <div class="col-sm-12 col-md-6">
                                            <label>Category</label>
                                            <select class="form-control select2 js-placeholder-single" name="category_id"
                                                value={{ old('category_id') }}>
                                                <option></option>
                                                @foreach ($categories as $category)
                                                    <option id="{{ $category->id }}" value="{{ $category->id }}">
                                                        {{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label>Location</label>
                                            <select class="form-control select2" name="location_id">
                                                <option value="" disabled selected hidden>Select location...</option>
                                                @foreach ($locations as $location)
                                                    <option id="{{ $location->id }}" value="{{ $location->id }}">
                                                        {{ $location->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-4 form-group row">
                                        <div class="col-sm-12 col-md-6">
                                            <label>Package</label>
                                            <select class="form-control select2" name="package_id">
                                                <option value="" disabled selected hidden>Select package...</option>
                                                @foreach ($packages as $package)
                                                    <option id="{{ $package->id }}" value="{{ $package->id }}">
                                                        {{ $package->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label>Amenities</label>
                                            <select class="form-control select2 js-placeholder-multiple"
                                                name="amenities_id[]" multiple="multiple">
                                                {{-- <option value="" disabled hidden>Select amenities...</option> --}}
                                                @foreach ($amenities as $amenity)
                                                    <option id="{{ $amenity->id }}" value="{{ $amenity->id }}">
                                                        {{ $amenity->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="mb-4 form-group row">
                                        <div class="col-sm-12">
                                            <label for="description" class="col-form-label">Description</label>
                                            <textarea class="form-control summernote" name="description" id="description" rows="10"></textarea>
                                        </div>
                                    </div>

                                    <div class="mb-4 form-group row">
                                        <div class="col-sm-12">
                                            <label for="attachement" id="attachement-label">Attachement</label>
                                            <input type="file" name="attachement" id="attachement" />
                                        </div>
                                    </div>

                                    <div class="mb-4 form-group row">
                                        <div class="col-sm-12">
                                            <label for="description" class="col-form-label">Google Map Embed Code</label>
                                            <textarea class="form-control" name="google_map_embed_code" id="description" rows="5"></textarea>
                                        </div>
                                    </div>

                                    <div class="mb-4 form-group row">
                                        <div class="col-sm-12 col-md-6">
                                            <label for="seo_title" class="col-form-label">SEO Title</label>
                                            <input id="seo_title" type="text" class="form-control"
                                                placeholder="Listing SEO Title..." name="seo_title">
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label for="seo_description" class="col-form-label">SEO Description</label>
                                            <textarea id="seo_description" type="text" class="form-control" placeholder="Listing SEO Description..."
                                                name="seo_description"></textarea>
                                        </div>
                                    </div>

                                    <div class="mb-4 form-group row">
                                        <div class="col-sm-12 col-md-6">
                                            <label for="email" class="col-form-label">Email</label>
                                            <input id="email" type="email" class="form-control"
                                                placeholder="Listing Email..." name="email">
                                            <div class="invalid-feedback">
                                                Please fill in the listing email
                                            </div>
                                            @if ($errors->has('email'))
                                                <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label for="phone" class="col-form-label">Phone</label>
                                            <input id="phone" type="text" class="form-control"
                                                placeholder="Listing Phone..." name="phone">
                                        </div>
                                    </div>

                                    <div class="mb-4 form-group row">
                                        <div class="col-sm-12 col-md-6">
                                            <label for="address" class="col-form-label">Address</label>
                                            <input id="address" type="text" class="form-control"
                                                placeholder="Listing Address..." name="address">
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label for="website" class="col-form-label">Website</label>
                                            <input id="website" type="text" class="form-control"
                                                placeholder="Listing Website..." name="website">
                                        </div>
                                    </div>

                                    <div class="mb-4 form-group row">
                                        <div class="col-sm-12 col-md-6">
                                            <label for="facebook_link" class="col-form-label">Facebook Link</label>
                                            <input id="facebook_link" type="text" class="form-control"
                                                placeholder="Listing Facebook Link..." name="facebook_link">
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label for="twitter_link" class="col-form-label">Twitter Link</label>
                                            <input id="twitter_link" type="text" class="form-control"
                                                placeholder="Listing Twitter Link..." name="twitter_link">
                                        </div>
                                    </div>

                                    <div class="mb-4 form-group row">
                                        <div class="col-sm-12 col-md-6">
                                            <label for="linkedin_link" class="col-form-label">Linkedin Link</label>
                                            <input id="linkedin_link" type="text" class="form-control"
                                                placeholder="Listing Linkedin Link..." name="linkedin_link">
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label for="whatsapp_link" class="col-form-label">Whatsapp Link</label>
                                            <input id="whatsapp_link" type="text" class="form-control"
                                                placeholder="Listing Whatsapp Link..." name="whatsapp_link">
                                        </div>
                                    </div>

                                    <div class="mb-4 form-group row">
                                        <div class="col-sm-12 col-md-4">
                                            <label class="mt-2 custom-switch">
                                                <input type="checkbox" name="is_verified" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Verified ?</span>
                                            </label>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <label class="mt-2 custom-switch">
                                                <input type="checkbox" name="is_featured" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Featured ?</span>
                                            </label>
                                        </div>
                                        <div class="col-sm-12 col-md-4">
                                            <label class="mt-2 custom-switch">
                                                <input type="checkbox" name="status" class="custom-switch-input"
                                                    checked>
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Status: Active / Inactive</span>
                                            </label>
                                        </div>
                                    </div>


                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Create</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>
    </div>
@endsection

@push('scripts')
    <script>
        var slug = function(str) {
            var $slug = '';
            var trimmed = $.trim(str);
            $slug = trimmed.replace(/[^a-z0-9-]/gi, '-').
            replace(/-+/g, '-').
            replace(/^-|-$/g, '');
            return $slug.toLowerCase();
        };

        $(document).ready(function() {
            $('#title').on("change keyup paste click", function() {
                $('#slug').val(slug($(this).val()));
            });

            $(".js-placeholder-single").select2({
                placeholder: "Select a category",
                allowClear: true
            });

            $(".js-placeholder-multiple").select2({
                placeholder: "Select amenities"
            });
        });

        $.uploadPreview({
            input_field: "#image-upload", // Default: .image-upload
            preview_box: "#image-preview", // Default: .image-preview
            label_field: "#image-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null, // Default: null
        });

        $.uploadPreview({
            input_field: "#thumbnail-upload", // Default: .image-upload
            preview_box: "#thumbnail-preview", // Default: .image-preview
            label_field: "#thumbnail-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null, // Default: null
        });
    </script>
@endpush
