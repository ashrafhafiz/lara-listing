@extends('frontend.layouts.master')

@section('content')
    <div class="container">
        <form action="{{ url('playground/upload-multiple-image-preview-1') }}" method="POST" enctype="multipart/form-data"
            class="p-5">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input type="file" name="images[]" id="images" placeholder="Choose images" multiple>
                    </div>
                    @error('images')
                        <div class="mt-1 mb-1 alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-12">
                    <div class="mt-1 text-center">
                        <div class="images-preview-div"></div>
                    </div>
                </div>
                <div class="mt-4 col-md-12">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
        </form>
    </div>
@endsection

@push('scripts')
    <script>
        var previewImages = function(input, imgPreviewPlaceholder) {
            if (input.files) {
                var filesAmount = input.files.length;
                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();
                    reader.onload = function(event) {
                        $($.parseHTML('<img style="width: 200px !important; margin-right: 10px;">'))
                            .attr('src', event.target.result)
                            .appendTo(imgPreviewPlaceholder);
                    }
                    reader.readAsDataURL(input.files[i]);
                }
            }
        };

        $('#images').on('change', function() {
            previewImages(this, 'div.images-preview-div');
        });
    </script>
@endpush
