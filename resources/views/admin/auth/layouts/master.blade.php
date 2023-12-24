<!DOCTYPE html>
<html lang="en">

@include('admin.auth.layouts.head')

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">

                    @yield('content')

                </div>
            </div>
        </section>
    </div>

    @include('admin.auth.layouts.javascript')

</body>

</html>
