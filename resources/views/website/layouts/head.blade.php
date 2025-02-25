@if(app()->getLocale() === 'ar')

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('assets/website/images/Fav_logo.png') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Stylesheets -->

    {{--bootstrap--}}
    {{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">--}}

    <link href="{{ asset('assets/website/css/font-awesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/color.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/global.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/blog.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/elpath.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/responsive.css') }}" rel="stylesheet">


    @vite(['resources/js/app.js'])

@else

    <!-- Fav Icon -->
    <link rel="icon" href="{{ asset('assets/website/images/Fav_logo.png') }}" type="image/x-icon">

    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
          integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
          crossorigin="anonymous" referrerpolicy="no-referrer"/>
    <!-- Stylesheets -->

    {{--bootstrap--}}
    {{--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">--}}

    <link href="{{ asset('assets/website/css/font-awesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/flaticon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/owl.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/nice-select.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/color.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/global.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/blog.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/elpath.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/ltr.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/website/css/responsive.css') }}" rel="stylesheet">


    @vite(['resources/js/app.js'])

@endif
