@extends('admin.dashboard.layouts.master')

@push('style')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />


    <style>
        html,
        body {
            height: 100%;
        }

        #actions {
            margin: 2em 0;
        }

        .progress {
            width: 10rem;
        }

        /* Mimic table appearance */
        div.table {
            display: table;
        }

        div.table .file-row {
            display: table-row;
        }

        div.table .file-row>div {
            display: table-cell;
            vertical-align: top;
            border-top: 1px solid #ddd;
            padding: 8px;
        }

        div.table .file-row:nth-child(odd) {
            background: #f9f9f9;
        }

        /* The total progress gets shown by event listeners */
        #total-progress {
            opacity: 0;
            transition: opacity 0.3s linear;
        }

        /* Hide the progress bar when finished */
        #previews .file-row.dz-success .progress {
            opacity: 0;
            transition: opacity 0.3s linear;
        }

        /* Hide the delete button initially */
        #previews .file-row .delete {
            display: none;
        }

        /* Hide the start and cancel buttons and show the delete button */

        #previews .file-row.dz-success .start,
        #previews .file-row.dz-success .cancel {
            display: none;
        }

        #previews .file-row.dz-success .delete {
            display: block;
        }
    </style>
@endpush

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <div class="section-header-back">
                    <a href="{{ route('admin.listing.index') }}" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
                </div>
                <h1>Image Gallery</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="{{ route('admin.listing.index') }}">All Listings</a></div>
                    <div class="breadcrumb-item active">Image Gallery</div>
                </div>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Listing Image Gallery</h4>
                                <div class="card-header-action">
                                    <a href="{{ route('admin.category.create') }}" class="btn btn-primary">Add Image</a>
                                </div>
                            </div>
                            <div class="card-body">

                                <div id="actions" class="row">
                                    <div class="col-lg-7">
                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                        <span class="btn btn-success fileinput-button">
                                            <i class="glyphicon glyphicon-plus"></i>
                                            <span>Add files...</span>
                                        </span>
                                        <button type="submit" class="btn btn-primary start">
                                            <i class="glyphicon glyphicon-upload"></i>
                                            <span>Start upload</span>
                                        </button>
                                        <button type="reset" class="btn btn-warning cancel">
                                            <i class="glyphicon glyphicon-ban-circle"></i>
                                            <span>Cancel upload</span>
                                        </button>
                                    </div>

                                    <div class="col-lg-5">
                                        <!-- The global file processing state -->
                                        <span class="fileupload-process">
                                            <div id="total-progress" class="progress active" aria-valuemin="0"
                                                aria-valuemax="100" aria-valuenow="0">
                                                <div class="progress-bar progress-bar-striped progress-bar-success"
                                                    role="progressbar" style="width: 0%" data-dz-uploadprogress></div>
                                            </div>
                                        </span>
                                    </div>
                                </div>

                                <div class="table table-striped" class="files" id="previews">

                                    <div id="template" class="file-row">
                                        <!-- This is used as the file preview template -->
                                        <div>
                                            <span class="preview"><img data-dz-thumbnail /></span>
                                        </div>
                                        <div>
                                            <p class="name" data-dz-name></p>
                                            <strong class="error text-danger" data-dz-errormessage></strong>
                                        </div>
                                        <div>
                                            <p class="size" data-dz-size></p>
                                            <div class="progress progress-striped active" role="progressbar"
                                                aria-valuemin="0" aria-valuemax="100" aria-valuenow="0">
                                                <div class="progress-bar progress-bar-success" style="width:0%;"
                                                    data-dz-uploadprogress></div>
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-primary start">
                                                <i class="glyphicon glyphicon-upload"></i>
                                                <span>Start</span>
                                            </button>
                                            <button data-dz-remove class="btn btn-warning cancel">
                                                <i class="glyphicon glyphicon-ban-circle"></i>
                                                <span>Cancel</span>
                                            </button>
                                            <button data-dz-remove class="btn btn-danger delete">
                                                <i class="glyphicon glyphicon-trash"></i>
                                                <span>Delete</span>
                                            </button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="card-footer">

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <script>
        // Get the template HTML and remove it from the doument.
        var previewNode = document.querySelector("#template");
        console.log(previewNode);
        previewNode.id = "";
        var previewTemplate = previewNode.parentNode.innerHTML;
        console.log(previewTemplate);
        previewNode.parentNode.removeChild(previewNode);

        var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
            url: "{{ route('admin.image-gallery.uploads') }}", // Set the url
            thumbnailWidth: 80,
            thumbnailHeight: 80,
            parallelUploads: 20,
            previewTemplate: previewTemplate,
            autoQueue: false, // Make sure the files aren't queued until manually added
            previewsContainer: "#previews", // Define the container to display the previews
            clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
        });

        myDropzone.on("addedfile", function(file) {
            // Hookup the start button
            file.previewElement.querySelector(".start").onclick = function() {
                myDropzone.enqueueFile(file);
            };
        });

        // Update the total progress bar
        myDropzone.on("totaluploadprogress", function(progress) {
            document.querySelector("#total-progress .progress-bar").style.width = progress + "%";
        });

        myDropzone.on("sending", function(file) {
            // Show the total progress bar when upload starts
            document.querySelector("#total-progress").style.opacity = "1";
            // And disable the start button
            file.previewElement.querySelector(".start").setAttribute("disabled", "disabled");
        });

        // Hide the total progress bar when nothing's uploading anymore
        myDropzone.on("queuecomplete", function(progress) {
            document.querySelector("#total-progress").style.opacity = "0";
        });

        // Setup the buttons for all transfers
        // The "add files" button doesn't need to be setup because the config
        // `clickable` has already been specified.
        document.querySelector("#actions .start").onclick = function() {
            myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED));
        };
        document.querySelector("#actions .cancel").onclick = function() {
            myDropzone.removeAllFiles(true);
        };
    </script>
    {{-- <script>
        var uploadedDocumentMap = {}
        Dropzone.options.documentDropzone = {
            url: "{{ route('playground.uploads.uploads') }}",
            maxFilesize: 2, // MB
            addRemoveLinks: true,
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function(file, response) {
                $('form').append('<input type="hidden" name="document[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            },
            removedfile: function(file) {
                file.previewElement.remove()
                var name = ''
                if (typeof file.file_name !== 'undefined') {
                    name = file.file_name
                } else {
                    name = uploadedDocumentMap[file.name]
                }
                $('form').find('input[name="document[]"][value="' + name + '"]').remove()
            },
            init: function() {
                @if (isset($project) && $project->document)
                    var files =
                        {!! json_encode($project->document) !!}
                    for (var i in files) {
                        var file = files[i]
                        this.options.addedfile.call(this, file)
                        file.previewElement.classList.add('dz-complete')
                        $('form').append('<input type="hidden" name="document[]" value="' + file.file_name + '">')
                    }
                @endif
            }
        }
    </script> --}}
@endpush
