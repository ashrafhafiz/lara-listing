@extends('admin.dashboard.layouts.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admin.dashboard.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Hero Section</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item active">Hero Section</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <form method="POST" action="{{ route('admin.sections.hero.store', $hero) }}"
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-header">
                                    <h4>Update Hero Section Contents</h4>
                                </div>
                                <div class="card-body">

                                    <div class="mb-4 form-group row">
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
                                            <label for="title" class="col-form-label">Title</label>
                                            <input type="text" class="form-control" value="{{ $hero->title }}"
                                                name="title">
                                            <div class="invalid-feedback">
                                                Please fill in the title
                                            </div>
                                            @php
                                                if ($errors->has('title')) {
                                                    toastr()->error($errors->first('title'));
                                                }
                                            @endphp
                                            @if ($errors->has('title'))
                                                <div class="alert alert-danger">{{ $errors->first('title') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <label class="col-form-label">Subtitle</label>
                                            <textarea class="form-control" rows="5" name="subtitle" style="height: auto !important;">{!! $hero->subtitle !!}</textarea>
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
        $(document).ready(function() {
            $('#bg_img-preview').css({
                // 'background-image': 'url({{ asset('default/banner_bg.jpg') }})',
                'background-image': 'url({{ asset($hero->bg_img) }})',
                'background-size': 'cover',
                'background-position': 'center center',
            });
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
