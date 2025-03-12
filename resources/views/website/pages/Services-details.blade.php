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
                <a href="{{ route('home') }}"><img style="width: 80px" src="{{ asset('assets/website/images/hedab_master/logo_main.png') }}" alt="" title=""/></a>
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
    <!-- End Mobile Menu -->


    <!-- sidebar-page-container -->
    <section class="sidebar-page-container sec-pad" style="direction: rtl; padding-top: 200px;">
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
                    <li class="breadcrumb-item" style="color: green; text-decoration: none; font-weight: bold;"
                        aria-current="page">
                        {{ $service->title }}
                    </li>
                </ol>
            </nav>

            <div class="row clearfix">
                <div class="col-lg-4 mt-5">
                    <!-- <div class="card text-center p-4 d-flex align-items-center justify-content-center"
                        style="box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 10px;">
                        <div class="content">
                            <h5>دونت بواسطة</h5>
                            <img style="width: 100px; height: 100px; border-radius: 50%; margin: 15px auto;"
                                src="./assets/images/project/project-1.jpg" alt="صورة الكاتب">
                        </div>
                    </div> -->
                    <div class="text" style="text-align: start;">
                        <h3>خدمات اخري</h3>
                        <ul>
                            @foreach($other_services as  $other_service)
                                <li
                                    style="background-color: #F9F9F9; padding: 5px; font-weight: 400; margin-top: 10px;">
                                    <a style="color: #112e11;"
                                       href="{{ route('service.details', $other_service) }}">{{ $other_service->title }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="card text-center color_white mt-5 w-100"
                         style="background-color:#526652 ; padding: 10px;">
                        <h3 class="color_white my-3">لا تتردد بالتواصل معنا</h3>
                        <div
                            style="background-color: #C19C6E; padding: 15px; border-radius: 50%; margin: 10px auto;">
                            <i class="fa-solid fa-phone" style="color: #fff; font-size: 25px;"></i>
                        </div>
                        <p class="color_white">وأبشر بطيبة الخاطر</p>
                        <h3 class="color_white fw_bold mt-2">{{ $service->contact_number }}</h3>
                    </div>
                    {{--                    <div class="button mt-4 text-center" style="background-color:#526652 ; padding: 10px;">--}}
                    {{--                        <a href="" class="color_white text-white">--}}
                    {{--                            تنزيل برشور الشركة <i class="fa-solid fa-file-pdf mx-3"></i>--}}
                    {{--                        </a>--}}
                    {{--                    </div>--}}
                </div>

                <div class="col-lg-8 col-md-12 col-sm-12 content-side">
                    <div class="sec-title centred mb_20">
                        <h2 class="p_relative d_block fs_40 lh_60 fw_exbold"
                            style="color: #001D00; text-align: start">
                            {{ $service->title }}
                        </h2>
                    </div>
                    <div class="blog-details-content">
                        <div class="news-block-two">
                            <div class="inner-box">
                                <div class="image-box">
                                    <figure class="image">
                                        <img style="width: 800px; height: 500px" src="{{ $service->getImageUrl() }}"
                                             alt="Blog_Image">
                                    </figure>
                                </div>
                            </div>
                        </div>
                        <div class="two-column">
                            <div class="row clearfix">
                                <div class="col-lg-12 col-md-6 col-sm-12 text-column">
                                    <h3 style="text-align: start; margin-bottom: 15px; color: #C19C6E;">تفاصيل
                                        الخدمة</h3>
                                    <div class="text"
                                         style="text-align: start; padding: 20px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border-radius: 10px;">

                                        <p style="word-wrap: break-word; overflow-wrap: break-word; white-space: normal;">
                                            {!! $service->description !!}
                                        </p>

                                    </div>
                                    <div class="features mt-3" style="text-align: start; margin-bottom: 15px;">
                                        <div class="text">
                                            <h4>
                                                المميزات:
                                            </h4>
                                            <ul>
                                                @foreach($service->features as $feature)
                                                    <li>{{ $feature->feature }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- sidebar-page-container end -->

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
                                        <div class="quote p_absolute t_0 r_0 fs_50"><i class="fal fa-quote-right"></i>
                                        </div>
                                        <figure class="author-thumb p_absolute l_0 t_0 w_60 h_60 b_radius_50"><img
                                                src="{{ $testimonial->profileImageUrl() }}" alt="">
                                        </figure>
                                        <h5 class="d_block fs_18 lh_30 fw_sbold">{{ $testimonial->client_name }}</h5>
                                        <span
                                            class="designation p_relative d_block fs_14 lh_20">{{ $testimonial->job_title }}</span>
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



    <!-- clients-section -->
    {{--    <section class="clients-section p_relative sec-pad centred" style="direction: ltr;">--}}
    {{--        <div class="large-container">--}}
    {{--            <div class="sec-title mb_30">--}}
    {{--                <h2 class="p_relative d_block fs_42 lh_52 mb_45 fw_exbold" style="color: #001D00;">عملاء يثقون بنا--}}
    {{--                </h2>--}}
    {{--                <p style="color: #526652;">تطور قدرةالعقارية شراكاتها الاستراتيجية في مختلف القطاعات لتعزز قدرتها--}}
    {{--                    وتوسيع نطاقها</p>--}}
    {{--            </div>--}}
    {{--            <ul class="six-item-carousel owl-carousel owl-theme owl-dots-none owl-nav-none">--}}
    {{--                <li>--}}
    {{--                    <figure class="clients-logo"><a href="index-3.html"><img--}}
    {{--                                src="{{asset('assets/website/images/clients/clients-1.png')}}" alt=""></a>--}}
    {{--                    </figure>--}}
    {{--                </li>--}}
    {{--                <li>--}}
    {{--                    <figure class="clients-logo"><a href="index-3.html"><img--}}
    {{--                                src="{{asset('assets/website/images/clients/clients-1.png')}}" alt=""></a>--}}
    {{--                    </figure>--}}
    {{--                </li>--}}
    {{--                <li>--}}
    {{--                    <figure class="clients-logo"><a href="index-3.html"><img--}}
    {{--                                src="{{asset('assets/website/images/clients/clients-1.png')}}" alt=""></a>--}}
    {{--                    </figure>--}}
    {{--                </li>--}}
    {{--                <li>--}}
    {{--                    <figure class="clients-logo"><a href="index-3.html"><img--}}
    {{--                                src="{{asset('assets/website/images/clients/clients-1.png')}}" alt=""></a>--}}
    {{--                    </figure>--}}
    {{--                </li>--}}
    {{--                <li>--}}
    {{--                    <figure class="clients-logo"><a href="index-3.html"><img--}}
    {{--                                src="{{asset('assets/website/images/clients/clients-1.png')}}" alt=""></a>--}}
    {{--                    </figure>--}}
    {{--                </li>--}}
    {{--            </ul>--}}
    {{--        </div>--}}
    {{--    </section>--}}
    <!-- clients-section end -->

    <section class="contact-style-three p_relative pt_110 pb_120" style="direction: rtl">
        <div class="large-container">
            <div class="sec-title mb_55 centred">
                <h2 style="color: #001D00;" class="p_relative d_block fs_40 lh_60 mb-2 fw_exbold">للتواصل والاستفسار
                </h2>
            </div>
            <div class="row clearfix d-flex align-items-center justify-content-center">
                <div
                    class="col-lg-9 d-flex align-items-center justify-content-center col-md-12 col-sm-12 form-column">
                    <div class="form-inner d-flex align-items-center justify-content-center">
                        <form method="post" action="{{ route('contact.store') }}" id="contact-form"
                              class="default-form">
                            @csrf
                            <div class="row clearfix">
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group mb_20">
                                    <input type="text" name="name" placeholder="الاسم الكامل" required=""/>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-12 form-group mb_20">
                                    <input type="text" name="phone" required="" placeholder="رقم الهاتف"/>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <div class="select-box">
                                        <select class="wide" name="service_id">
                                            <option data-display="اختر الخدمة المطلوبة">
                                                اختر الخدمة المطلوبة
                                            </option>
                                            @foreach($all_services as $a_service)
                                                <option value="{{ $a_service->id }}">{{ $a_service->title }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12 col-sm-12 form-group">
                                    <div class="select-box">
                                        <select class="wide" name="offer_type">
                                            <option data-display="نوع العقار">نوع العقار</option>
                                            @foreach(\App\Enums\OfferType::cases() as $offerType)
                                                <option
                                                    value="{{ $offerType->value }}">{{ $offerType->label() }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group mb_20">
                                    <textarea name="message" placeholder="ملاحظات"></textarea>
                                </div>

                                <div class="col-lg-12 mb-3 col-md-12 col-sm-12" style="text-align: start;">
                                    <div class="form-check ">
                                        <input class="form-check-input " type="checkbox" value="checked"
                                               id="flexCheckChecked" checked>
                                        <label class="form-check-label mr-3" for="flexCheckChecked">
                                            أقر بأنني قد قرأت <a href="#">الشروط والاحكام</a> الخاصة
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-12 col-md-12 col-sm-12 form-group message-btn mr-0"
                                     style="text-align: center;">
                                    <button class="theme-btn btn-one rounded-lg w-100" style="text-align: center;"
                                            type="submit" name="submit-form">
                                        ارسال
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="contact-cards mt-5">
                <!-- Card 1 -->
                <div class="card">
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>البريد الالكتروني</h3>
                    <p>info@trest.com</p>
                </div>

                <!-- Card 2 -->
                <div class="card">
                    <div class="icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <h3>ارقام الهاتف</h3>
                    <p>543545<br>4535435<br>435454</p>
                </div>

                <!-- Card 3 -->
                <div class="card">
                    <div class="icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <h3>فروع الشركة</h3>
                    <p>
                        fsdfsfsdfsd
                    </p>
                </div>
            </div>
        </div>
    </section>

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
