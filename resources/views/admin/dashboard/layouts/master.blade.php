<!DOCTYPE html>
<html lang="en">

@include('admin.dashboard.layouts.head')

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">

            @include('admin.dashboard.layouts.navbar')

            @include('admin.dashboard.layouts.main-sidebar')

            <!-- Main Content -->
            @yield('content')

            @include('admin.dashboard.layouts.footer')

        </div>
    </div>

    @include('admin.dashboard.layouts.javascript')
</body>

</html>
