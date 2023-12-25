<!DOCTYPE html>
<html lang="en">

@include('frontend.layouts.head')

<body>

    {{-- TOPBAR PART START --}}
    @include('frontend.layouts.topbar')
    {{-- TOPBAR PART END --}}


    {{-- MENU PART START --}}
    @include('frontend.layouts.navbar')
    {{-- MENU PART END --}}

    @yield('content')

    {{-- FOOTER PART START --}}
    @include('frontend.layouts.footer')
    {{-- FOOTER PART END --}}


    <!--=============SCROLL BTN==============-->
    <div class="scroll_btn">
        <i class="fas fa-chevron-up"></i>
    </div>
    <!--=============SCROLL BTN==============-->

    @include('frontend.layouts.javascript')

</body>

</html>
