<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">



<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

    <title>المدونة {{ $blog->title }}</title>


    @include('website.layouts.head')

</head>


<!-- page wrapper -->

<body class="{{ app()->getLocale() }}">

<div class="boxed_wrapper">


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

    @include('website.layouts.header')

    <div class="mobile-menu">
        <div class="menu-backdrop"></div>
        <div class="close-btn"><i class="fas fa-times"></i></div>

        <nav class="menu-box" style="direction: rtl; text-align: right">
            <div class="nav-logo">
                <a href="{{ route('home') }}"><img style="width: 80px" src="{{ asset('assets/website/images/hedab_master/logo_main.png') }}" alt="" title="" /></a>
            </div>
            <div class="menu-outer">
                <!--Here Menu Will Come Automatically Via Javascript / Same Menu as in Header-->
            </div>
            <div class="contact-info">
                <h4>للتواصل معنا</h4>
                <ul>
                    <li>الرياض</li>
                    <li><a href="mailto:info@example.com">info@example.com</a></li>
                </ul>
            </div>
            <div class="social-links">
                <ul class="clearfix">
                    <li><a href="#"><span class="fab fa-x"></span></a></li>
                    <li><a href="#"><span class="fab fa-facebook-square"></span></a></li>
                    <li><a href="#"><span class="fab fa-instagram"></span></a></li>
                    <li><a href="#"><span class="fab fa-youtube"></span></a></li>
                </ul>
            </div>
        </nav>
    </div>

    <section class="sidebar-page-container sec-pad" style="direction: rtl; padding-top: 200px;">
        <div class="auto-container">

            <nav style="--bs-breadcrumb-divider: '>'; background-color: #f9f9f9; padding: 10px; border-radius: 5px;"
                 aria-label="breadcrumb">
                <ol class="breadcrumb" style=" margin: 0; background-color: transparent; padding: 0;">
                    <li class="breadcrumb-item">
                        <a href="#" class="breadcrumb-item active">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        المدونة
                    </li>
                    <li class="breadcrumb-item" style="color: green; text-decoration: none; font-weight: bold;"
                        aria-current="page">
                        {{ $blog->title }}
                    </li>
                </ol>
            </nav>



            <div class="row clearfix">
                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="sec-title centred mb_20">
                        <h2 class="p_relative d_block fs_40 lh_60 fw_exbold"
                            style="color: #001D00; text-align: start">{{ $blog->title }}</h2>
                    </div>
                    <div class="blog-details-content">
                        <div class="news-block-two">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="">
                                        <img width="100%" src="{{ $blog->getImageUrl() }}"
                                                               alt="Blog_Image">
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="two-column">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-6 col-sm-12 text-column">
                                    <h3 style="text-align: start; margin-bottom: 15px;">المقدمة</h3>
                                    <div class="text"
                                         style="text-align: start; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                                        <p>{!! $blog->excerpt !!}</p>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-6 col-sm-12 text-column my-4">
                                    <h3 style="text-align: start; margin-bottom: 15px;">المحتوي</h3>
                                    <div class="text"
                                         style="text-align: start; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                                        <p>
                                            {!! $blog->content !!}
                                        </p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 my-4">
                    <div class="card text-center p-4 d-flex align-items-center justify-content-center"
                         style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                        <div class="content">
                            <h5>دونت بواسطة</h5>
                            <img style="width: 100px; height: 100px; border-radius: 50%; margin: 15px auto;"
                                 src="{{ asset('assets/website/images/project/project-1.jpg') }}" alt="صورة الكاتب">

                        </div>
                        <span>{{ $blog->author->name }}</span>
                    </div>
                    <div class="card text-center mt-4 d-flex align-items-center justify-content-center"
                         style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 10px; padding: 15px;">
                        <div class="content">
                            <h5>هل لديك سؤال</h5>
                            <button class="btn btn-success" style="margin: 25px auto;">تحدث معنا
                                <i class="fa-solid fa-phone" style="margin: 0px 10px;"></i>
                            </button>
                        </div>
                        <span>444</span>

                    </div>
                </div>




            </div>
        </div>
    </section>


    @include('website.layouts.subscribe')

    @include('website.layouts.footer')
    <!-- main-footer end -->





    <!--Scroll to top-->
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fal fa-long-arrow-up"></span>
    </button>
</div>


@include('website.layouts.scripts')

</body><!-- End of .page_wrapper -->


</html>
