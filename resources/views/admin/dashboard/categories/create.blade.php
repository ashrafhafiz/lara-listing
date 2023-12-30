@extends('admin.dashboard.layouts.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admin.category.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Create category</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admin.category.index') }}">Categories</a>
                    </div>
                    <div class="breadcrumb-item">Create Category</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="card-header">
                                    <h4>Create a New category</h4>
                                    <div class="card-header-action">
                                        <a href="{{ route('admin.category.index') }}" class="btn btn-primary">Cancel</a>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="mb-4 form-group row">
                                        <div class="col-sm-12 col-md-6">
                                            <label for="name" class="col-form-label">Name</label>
                                            <input id="category-name" type="text" class="form-control"
                                                placeholder="Category Name..." name="name">
                                            <div class="invalid-feedback">
                                                Please fill in the category name
                                            </div>
                                            {{-- @php
                                                if ($errors->has('name')) {
                                                    toastr()->error($errors->first('name'));
                                                }
                                            @endphp --}}
                                            @if ($errors->has('name'))
                                                <div class="alert alert-danger">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label class="col-form-label">Slug</label>
                                            <input id="category-slug" type="text" class="form-control" readonly
                                                placeholder="Category Slug..." name="slug">
                                        </div>
                                    </div>

                                    <div class="mb-4 form-group row">
                                        <div class="col-sm-12 col-md-6">
                                            <label for="icon_img" class="col-form-label">Icon Image</label>
                                            <div id="icon_img-preview" class="image-preview">
                                                <label for="icon_img-upload" id="icon_img-label">Choose File</label>
                                                <input type="file" name="icon_img" id="icon_img-upload" />
                                            </div>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label for="bg_img" class="col-form-label">Background Image</label>
                                            <div id="bg_img-preview" class="image-preview" style="width: 500px !important;">
                                                <label for="bg_img-upload" id="bg_img-label">Choose File</label>
                                                <input type="file" name="bg_img" id="bg_img-upload" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mb-4 form-group row">
                                        <div class="col-sm-12 col-md-6">
                                            <label class="mt-2 custom-switch">
                                                <input type="checkbox" name="show_at_home" class="custom-switch-input">
                                                <span class="custom-switch-indicator"></span>
                                                <span class="custom-switch-description">Show on Home Page</span>
                                            </label>
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label class="mt-2 custom-switch">
                                                <input type="checkbox" name="status" class="custom-switch-input" checked>
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
            $('#category-name').on("change keyup paste click", function() {
                $('#category-slug').val(slug($(this).val()));
            });
        });

        $.uploadPreview({
            input_field: "#icon_img-upload", // Default: .image-upload
            preview_box: "#icon_img-preview", // Default: .image-preview
            label_field: "#icon_img-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null, // Default: null
        });

        $.uploadPreview({
            input_field: "#bg_img-upload", // Default: .image-upload
            preview_box: "#bg_img-preview", // Default: .image-preview
            label_field: "#bg_img-label", // Default: .image-label
            label_default: "Choose File", // Default: Choose File
            label_selected: "Change File", // Default: Change File
            no_label: false, // Default: false
            success_callback: null, // Default: null
        });
    </script>
@endpush
