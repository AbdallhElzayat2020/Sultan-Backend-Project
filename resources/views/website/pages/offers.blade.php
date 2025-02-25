<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">


<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

    <title>العروض العقاريه</title>

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


    <div class="container my-5" style="padding-top: 100px;">
        <nav style="--bs-breadcrumb-divider: '>'; background-color: #f9f9f9; padding: 10px; border-radius: 5px;"
             aria-label="breadcrumb">
            <ol class="breadcrumb" style=" margin: 0; background-color: transparent; padding: 0;">
                <li class="breadcrumb-item">
                    <a href="#" style="color: #001D00; text-decoration: none; font-weight: bold;">الرئيسية</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    العروض العقارية
                </li>

            </ol>
        </nav>
        <form action="" method="get">
            <div class="row g-3 align-items-center">

                <!-- Property Status -->
                <div class="col-lg-4 mt-3 col-md-4 col-sm-6">
                    <div class="select-box">
                        <select class="wide" name="o_type">
                            <option data-display="حالة العقار" value="">حالة العقار</option>
                            @foreach(\App\Enums\OfferType::cases() as $offerType)
                                <option @selected(request('o_type') == $offerType->value) value="{{ $offerType->value }}">{{ $offerType->label() }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Property Type -->
                <div class="col-lg-4 mt-3 col-md-4 col-sm-6">
                    <div class="select-box">
                        <select class="wide" name="op_type">
                            <option selected value="">نوع العقار</option>
                            @foreach(\App\Enums\PropertyType::cases() as $propertyType)
                                <option @selected(request('op_type') == $propertyType->value) value="{{ $propertyType->value }}">{{ $propertyType->label() }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Locations -->
                <div class="col-lg-4 mt-3 col-md-4 col-sm-6">

                    <div class="select-box">
                        <select class="wide" name="op_location">
                            <option selected value="">الموقع</option>
                            @foreach(\App\Enums\PropertyLocations::cases() as $propertyLocation)
                                <option @selected(request('op_location') == $propertyLocation->value) value="{{ $propertyLocation->value }}">{{ $propertyLocation->label() }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <!-- Price Range -->
                <div class="col-lg-9 col-md-4 col-sm-6 mt-3">
                    <input type="number" value="{{ request('price') }}"  class="form-control shadow-sm" placeholder="السعر"
                           name="price"
                            id="priceRangeInput">
                </div>

                <!-- Search Button -->
                <div class="col-lg-3 col-md-4 col-sm-12 mt-3 text-center">
                    <button class="btn btn-success w-100 shadow-sm">بحث <i class="fas fa-search"></i></button>
                </div>
            </div>
        </form>
        <div class="row g-4 mt-5">
            @foreach($offers as $offer)
                <div class="col-lg-4 col-md-6 col-sm-12 news-block mt-4 text-center">
                    <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms" data-wow-duration="1500ms">
                        <div class="inner-box bg-color-1">
                            <div class="image-box">
                                <figure class="image">
{{--                                    <a href="blog-details.html"><img--}}
{{--                                            src="{{asset('assets/website/images/news/news-1.jpg')}}" alt=""/></a>--}}

                                    <a href="{{ route('offers.details', $offer) }}"><img
                                            src="{{ $offer->getThumbUrl() }}" alt=""/></a>
                                </figure>
                            </div>
                            <div class="lower-content">
                                <h3>
                                    <a href="{{ route('offers.details', $offer) }}">{!! $offer->short_title !!}</a>
                                </h3>
                                <p>
                                    {!! $offer->short_description !!}
                                </p>
                                <h3>
{{--                                    <a href="blog-details.html">200,000 ريال / سنوياً</a>--}}

                                    <a href="{{ route('offers.details', $offer) }}">{{ $offer->price }} ريال / {{ $offer->price_type->label() }}</a>

                                </h3>
                                <p
                                    style="background-color: #001D00; padding: 5px; color: #fff;font-weight: bold; border-radius: 5px;">
                                    <a class="text-white" href="{{ route('offers.details', $offer) }}">
                                        تفاصيل العقار
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>

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
