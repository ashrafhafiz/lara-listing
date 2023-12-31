@extends('admin.dashboard.layouts.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admin.location.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Update Location</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admin.location.index') }}">Locations</a></div>
                    <div class="breadcrumb-item">Update Location</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form method="POST" action="{{ route('admin.location.update', $location) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="card-header">
                                    <h4>Edit Location</h4>
                                    <div class="card-header-action">
                                        <a href="{{ route('admin.location.index') }}" class="btn btn-primary">Cancel</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4 form-group row">
                                        <div class="col-sm-12 col-md-6">
                                            <label for="name" class="col-form-label">Name</label>
                                            <input id="location-name" type="text" class="form-control"
                                                placeholder="Location Name..." name="name" value="{{ $location->name }}">
                                            <div class="invalid-feedback">
                                                Please fill in the location name
                                            </div>
                                            @if ($errors->has('name'))
                                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label class="col-form-label">Slug</label>
                                            <input id="location-slug" type="text" class="form-control" readonly
                                                placeholder="Location Slug..." name="slug" value="{{ $location->slug }}">
                                        </div>
                                    </div>

                                    <div class="mb-4 form-group row">
                                        <div class="col-sm-12 col-md-6">
                                            <label class="mt-2 custom-switch">
                                                <input type="checkbox" name="show_at_home" class="custom-switch-input"
                                                    {{ $location->show_at_home === 1 ? 'checked' : '' }}>
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Show on Home Page</span>
                                            </label>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label class="mt-2 custom-switch">
                                                <input type="checkbox" name="status" class="custom-switch-input"
                                                    @checked($location->status === 1)>
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
            $('#location-name').on("change keyup paste click", function() {
                $('#location-slug').val(slug($(this).val()));
            });
        });
    </script>
@endpush
