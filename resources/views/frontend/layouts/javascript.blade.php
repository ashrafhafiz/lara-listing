   <!--jquery library js-->
   <script src="{{ asset('assets/frontend/js/jquery-3.6.0.min.js') }}"></script>
   {{-- <script src="{{ asset('assets/admin/modules/jquery.min.js') }}"></script> --}}
   <!--bootstrap js-->
   <script src="{{ asset('assets/frontend/js/bootstrap.bundle.min.js') }}"></script>
   <!--font-awesome js-->
   <script src="{{ asset('assets/frontend/js/Font-Awesome.js') }}"></script>
   <!--slick js-->
   <script src="{{ asset('assets/frontend/js/slick.min.js') }}"></script>
   <!--venobox js-->
   <script src="{{ asset('assets/frontend/js/venobox.min.js') }}"></script>
   <!--counter js-->
   <script src="{{ asset('assets/frontend/js/jquery.waypoints.min.js') }}"></script>
   <script src="{{ asset('assets/frontend/js/jquery.countup.min.js') }}"></script>
   <!--nice select js-->
   <script src="{{ asset('assets/frontend/js/select2.min.js') }}"></script>
   <!--isotope js-->
   <script src="{{ asset('assets/frontend/js/isotope.pkgd.min.js') }}"></script>
   <!--summer_note js-->
   <script src="{{ asset('assets/frontend/js/summernote.min.js') }}"></script>
   <!--select js-->
   <script src="{{ asset('assets/frontend/js/jquery.nice-select.min.js') }}"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
   <script>
       @if ($errors->any())
           @foreach ($errors->all() as $error)
               toastr.error("{{ $error }}");
           @endforeach
       @endif
   </script>

   <!--main/custom js-->
   <script src="{{ asset('assets/frontend/js/main.js') }}"></script>

   <script src="{{ asset('assets/admin/modules/upload-preview/assets/js/jquery.uploadPreview.min.js') }}"></script>

   @stack('scripts')
