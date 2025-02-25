<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />

    <title>مدونة قدرة العقارية</title>

    @include('website.layouts.head')
</head>

<!-- page wrapper -->

<body class="{{ app()->getLocale() }}">
<div class="boxed_wrapper">
    <!-- preloader -->
    <div class="loader-wrap">
        <div class="preloader">
            <div class="preloader-close">x</div>
            <div id="handle-preloader" class="handle-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- preloader end -->

    <!-- main header -->
    @include('website.layouts.header')
    <!-- main-header end -->

    <!-- Mobile Menu  -->
    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="fas fa-times"></i></div>

        <nav class="menu-box" style="direction: rtl; text-align: right">
            <div class="nav-logo">
                <a href="/{{ route('home') }}"><img src="{{ asset('assets/website/images/LOGO.png') }}" alt="" title=""/></a>
            </div>
            <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
            <div class="contact-info">
                <h4>للتواصل معنا</h4>
                <ul>
                    <li>الرياض - حي المروج</li>
                    <li>الرياض - حي السلي</li>
                    <li><a href="mailto:info@example.com">info@example.com</a></li>
                </ul>
            </div>
            <div class="social-links">
                <ul class="clearfix">
                    <li>
                        <a href="index-2.html"><span class="fab fa-x"></span></a>
                    </li>
                    <li>
                        <a href="index-2.html"><span class="fab fa-facebook-square"></span></a>
                    </li>
                    <li>
                        <a href="index-2.html"><span class="fab fa-instagram"></span></a>
                    </li>
                    <li>
                        <a href="index-2.html"><span class="fab fa-youtube"></span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
    <!-- End Mobile Menu -->

    <!-- Page Title -->
    <!-- <section class="page-title p_relative pt_250 pb_170 centred" style="
      {{ asset('background-image: url(assets/images/bannerwebsite//Home_2.png);') }}
      background-position: center;">
        <div class="bg-layer p_absolute r_100 t_0"></div>
        <div class="large-container">
            <div class="content-box p_relative d_block z_5">
                <div class="title mb_25">
                    <h1 class="d_block fs_68 lh_76 color_white fw_exbold">
                        مدونة قدرة
                    </h1>
                </div>
            </div>
        </div>
    </section> -->
    <!-- End Page Title -->

    <!-- news-section -->
    <section class="news-section p_relative sec-pad pt_250 pb_170" style="padding-top: 200px;">
        <div class="large-container">
            <nav style="--bs-breadcrumb-divider: '>'; background-color: #f9f9f9; padding: 10px; border-radius: 5px;"
                 aria-label="breadcrumb">
                <ol class="breadcrumb" style=" margin: 0; background-color: transparent; padding: 0;">
                    <li class="breadcrumb-item">
                        <a href="#" style="color: green; text-decoration: none; font-weight: bold;">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        المدونة
                    </li>
                </ol>
            </nav>

            <div class="row clearfix">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-12 news-block mt-4 text-center">
                        <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms"
                             data-wow-duration="1500ms">
                            <div class="inner-box bg-color-1">
                                <div class="image-box">
                                    <figure class="image">
                                        <a href="{{ route('blogs.details', $blog) }}">
                                            <img src="{{ $blog->getThumbUrl() }}"
                                                 alt=""/></a>
                                    </figure>
                                    <!-- <span class="post-date">7 1 2003</span> -->
                                </div>
                                <div class="lower-content">
                                    <h3>
                                        <a href="{{ route('blogs.details', $blog) }}">{{ $blog->title }}</a>
                                    </h3>
                                    <p>
                                        {!! $blog->excerpt !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- news-section end -->

    <!-- subscribe-section -->
    @include('website.layouts.subscribe')
    <!-- subscribe-section end -->

    <!-- main-footer -->
    @include('website.layouts.footer')
    <!-- main-footer end -->

    <!--Scroll to top-->
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fal fa-long-arrow-up"></span>
    </button>
</div>

@include('website.layouts.scripts')
</body>
<!-- End of .page_wrapper -->

</html>
