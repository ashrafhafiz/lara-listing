@extends('admin.dashboard.layouts.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admin.listing.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Update Listing</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admin.listing.index') }}">All Listings</a></div>
                    <div class="breadcrumb-item">Update Listing</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form method="POST" action="{{ route('admin.listing.update', $listing) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-header">
                                    <h4>Update Listing</h4>
                                    <div class="card-header-action">
                                        <a href="{{ route('admin.listing.index') }}" class="btn btn-primary">Cancel</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="mb-5 form-group row">
                                        <div class="col-sm-12 col-md-6">
                                            <label for="name" class="col-form-label">Name</label>
                                            <input id="amenity-name" type="text" class="form-control"
                                                placeholder="Amenity Name..." name="name" value="{{ $amenity->name }}">
                                            <div class="invalid-feedback">
                                                Please fill in the amenity name
                                            </div>
                                            @if ($errors->has('name'))
                                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label class="col-form-label">Slug</label>
                                            <input id="amenity-slug" type="text" class="form-control" readonly
                                                placeholder="Amenity Slug..." name="slug" value="{{ $amenity->slug }}">
                                        </div>
                                    </div>
                                    <div class="mb-5 form-group row">
                                        <div class="col-sm-6 col-lg-4">
                                            <label for="" class="mr-2 col-form-label">Icon Image</label>
                                            <button class="btn btn-primary" data-unselected-class="btn-primary"
                                                data-icon="{{ $amenity->amenity_icon }}" data-selected-class="btn-warning"
                                                role="iconpicker" name="amenity_icon"></button>
                                        </div>
                                    </div>
                                    <div class="mb-5 form-group row">
                                        <div class="col-sm-6 col-lg-4">
                                            <label class="custom-switch">
                                                <input type="checkbox" name="status" class="custom-switch-input"
                                                    @checked($amenity->status === 1)>
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Status: Active / Inactive</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
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
            $('#amenity-name').on("change keyup paste click", function() {
                $('#amenity-slug').val(slug($(this).val()));
            });
        });
    </script>
@endpush
