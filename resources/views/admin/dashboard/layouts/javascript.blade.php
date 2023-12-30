<!-- General JS Scripts -->
<script src="{{ asset('assets/admin/modules/jquery.min.js') }}"></script>
<script src="{{ asset('assets/admin/modules/popper.js') }}"></script>
<script src="{{ asset('assets/admin/modules/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/admin/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ asset('assets/admin/modules/moment.min.js') }}"></script>
<script src="{{ asset('assets/admin/js/stisla.js') }}"></script>


<!-- JS Libraies -->
<script src="{{ asset('assets/admin/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ asset('assets/admin/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>
<script src="{{ asset('assets/admin/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>
<script src="{{ asset('assets/admin/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
{{-- <script src="{{ asset('assets/admin/modules/sweetalert/sweetalert.min.js') }}"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- Page Specific JS File -->
{{-- <script src="{{ asset('assets/admin/js/page/features-post-create.js') }}"></script> --}}
{{-- <script src="{{ asset('assets/admin/js/page/modules-sweetalert.js') }}"></script> --}}

<!-- Template JS File -->
<script src="{{ asset('assets/admin/js/scripts.js') }}"></script>
<script src="{{ asset('assets/admin/js/custom.js') }}"></script>

<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap4.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
</script>
<script>
    // $("body").on('click', '#swal-6', function(e) {
    //     e.preventDefault();
    //     swal({
    //             title: 'Are you sure?',
    //             text: 'Once deleted, you will not be able to recover this imaginary file!',
    //             icon: 'warning',
    //             buttons: true,
    //             dangerMode: true,
    //         })
    //         .then((willDelete) => {
    //             if (willDelete) {
    //                 swal('Poof! Your imaginary file has been deleted!', {
    //                     icon: 'success',
    //                 });
    //             } else {
    //                 swal('Your imaginary file is safe!');
    //             }
    //         });
    // });

    // Sweetalert 2
    $("body").on('click', '#swal-6', function(e) {
        e.preventDefault();
        Swal.fire({
            title: "Are you sure?",
            text: "You won't be able to revert this!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Yes, delete it!"
        }).then((result) => {
            if (result.isConfirmed) {
                Swal.fire({
                    title: "Deleted!",
                    text: "Your file has been deleted.",
                    icon: "success"
                });
            }
        });
    });
</script>
@stack('scripts')
