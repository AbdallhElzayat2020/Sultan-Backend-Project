<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">


<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

    <title>خدماتنا</title>

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
                <a href="index-2.html"><img src="{{ asset('assets/website/images/LOGO.png') }}" alt="" title=""/></a>
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

    <!-- sidebar-page-container -->
    <section class="sidebar-page-container sec-pad" style="direction: rtl; padding-top: 150px;">
        <div class="auto-container">

            <nav style="--bs-breadcrumb-divider: '>'; background-color: #f9f9f9; padding: 10px; border-radius: 5px;"
                 aria-label="breadcrumb">
                <ol class="breadcrumb" style=" margin: 0; background-color: transparent; padding: 0;">
                    <li class="breadcrumb-item">
                        <a href="#" class="breadcrumb-item active">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        الخدمات
                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- sidebar-page-container end -->

    <section class="feature-style-two p_relative sec-pad">
        <div class="intro text-center mb-5">
            <div class="heading text-center font-weight-bold mb-3" style="color: #001D00; font-size: 40px;">خدماتنا
            </div>
            <p style="color: #526652;">تقدم <span class="gold-color text-center">“قدرة العقارية”</span> مجموعة
                متنوعة من الخدمات بإسلوب حديث وإحترافي بخبرات متنوعة لتلبية إحتياجات مُختلف شرائح القطاع العقاري</p>
        </div>
        <div class="large-container">
            <div class="row clearfix d-flex align-items-center justify-content-center">
                @foreach($services as $service)
                    <div class="col-lg-4 col-md-6 col-sm-12 feature-block mt-3">
                        <div class="feature-block-two wow fadeInUp animated" data-wow-delay="00ms"
                             data-wow-duration="1500ms">
                            <div
                                class="inner-box p_relative text-center d_block bg_white b_shadow_6 pt_60 pr_45 pb_55 pl_45 tran_5">
                                <div class="icon-box p_relative d_block fs_100 lh_100 green_color mb_25 tran_5">
                                    <img src="{{ $service->getIconUrl() }}" alt="service_image">
                                </div>
                                <h3 class="d_block fs_20 lh_30 fw_exbold mb_25 pb_25">
                                    <a href="{{ route('service.details', $service) }}" class="d_iblock color_black hov_color"
                                       style="color: #526652 !important;">{{ $service->title }}</a>
                                </h3>
                                <p style="text-align: start;">{!! $service->short_description !!}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>


    <!-- clients-section -->
    <section class="clients-section p_relative sec-pad centred" style="direction: ltr;">
        <div class="large-container">
            <div class="sec-title mb_30">
                <h2 class="p_relative d_block fs_42 lh_52 mb_45 fw_exbold" style="color: #001D00;">عملاء يثقون بنا
                </h2>
                <p style="color: #526652;">‫تطور ‬‫قدرة‬ ‫العقارية‬ ‫شراكاتها‬ ‫‬ الا‫ستراتيجية ‬‫في‬ ‫مختلف‬
                    ‫القطاعات‬ ‫لتعزز‬ ‫قدرتها‬ ‫وتوسيع‬ ‫نطاقها‬</p>
            </div>
            <ul class="six-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">
                <li>
                    <figure class="clients-logo"><a href="index-3.html"><img
                                src="{{asset('assets/website/images/clients/clients-1.png')}}" alt=""></a></figure>
                </li>

            </ul>
        </div>
    </section>
    <!-- clients-section end -->


    @if($testimonials->count())
        <section class="testimonial-style-two p_relative sec-pad bg-color-1" style="direction: ltr;">
            <div class="pattern-layer p_absolute"
                 style="background-image: url('{{asset('assets/website/images/shape/shape-14.png')}}');">
            </div>
            <div class="large-container">
                <div class="sec-title centred mb_55">
                    <h2 class="p_relative d_block fs_40 lh_60 fw_exbold" style="color: #001D00;">ماذا يقولون عنا</h2>
                </div>
                <div class="testimonial-inner p_relative pl_100 pr_100">
                    <div class="two-item-carousel owl-carousel owl-theme owl-nav-none">
                        @foreach($testimonials as $testimonial)
                            <div class="testimonial-block-one mb_75">
                                <div class="inner-box p_relative d_block bg_white pt_45 pr_40 pb_40 pl_40">
                                    <div class="author-box p_relative d_block pl_80 pr_80 mb_35">
                                        <div class="quote p_absolute t_0 r_0 fs_50"><i class="fal fa-quote-right"></i></div>
                                        <figure class="author-thumb p_absolute l_0 t_0 w_60 h_60 b_radius_50"><img
                                                src="{{ $testimonial->profileImageUrl()  }}" alt="">
                                        </figure>
                                        <h5 class="d_block fs_18 lh_30 fw_sbold">{{ $testimonial->client_name }}</h5>
                                        <span class="designation p_relative d_block fs_14 lh_20">{{ $testimonial->job_title }}</span>
                                    </div>
                                    <div class="text p_relative d_block">
                                        <p class="lh_30">{{ $testimonial->testimonial }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif


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
