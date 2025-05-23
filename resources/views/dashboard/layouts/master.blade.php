<!DOCTYPE html>

{{--<html--}}
{{--    lang="en"--}}
{{--    class="light-style layout-navbar-fixed layout-menu-fixed"--}}
{{--    dir="ltr"--}}
{{--    data-theme="theme-default"--}}
{{--    data-assets-path="{{asset('assets/dashboard/assets')}}/"--}}
{{--    data-template="vertical-menu-template">--}}

<html lang="en"
      class="light-style layout-navbar-fixed layout-menu-fixed sf-js-enabled"
      dir="rtl" data-theme="theme-default"
      data-assets-path="{{asset('assets/dashboard/assets')}}/"
      data-template="vertical-menu-template">
<head>
    <meta charset="utf-8"/>
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>

    <title>@yield('title')</title>

    <meta name="description" content=""/>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/website/images/Logo_master.png') }}" />
    @include('dashboard.layouts.main-head')

    @yield('css')



    @vite(['resources/js/app.js'])

</head>

<body>
<!-- Layout wrapper -->
<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">
        <!-- Menu -->
        @include('dashboard.layouts.main-sidebar')
        <!-- / Menu -->

        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->

            @include('dashboard.layouts.main-header')

            <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                @yield('content')
                <!-- / Content -->

                <!-- Footer -->
                @include('dashboard.layouts.main-footer')
                <!-- / Footer -->

                <div class="content-backdrop fade"></div>
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->
@include('dashboard.layouts.scripts')
@yield('js')


@include('sweetalert::alert')


</body>
</html>
