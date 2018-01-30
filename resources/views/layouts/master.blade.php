<!DOCTYPE html>

<html lang="en">

    <head>
        @include('layouts.htmlHead')
    </head>

    <body>

        <div class="page-wraper">
            <!-- HEADER START -->
            @include('layouts.header')
            <!-- HEADER END -->

            @yield('content')

            <!-- FOOTER START -->
            @include('layouts.footer')
            <!-- FOOTER END -->

            <!-- BUTTON TOP START -->
            @include('layouts.buttonTop')
        </div>

        @include('layouts.useScript')

        @yield('scriptArea_1')

        <!-- LOADING AREA START ===== -->
        @include('layouts.loadingArea')
        <!-- LOADING AREA  END ====== -->

        @yield('scriptArea_2')

    </body>

</html>
