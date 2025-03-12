<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">


<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

    <title>عرض عقاري </title>

    @include('website.layouts.head')

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <style>
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        .swiper {
            width: 100%;
            margin: 0 auto;
        }

        .mySwiper2 {
            height: 450px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .mySwiper2 .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            cursor: pointer;
        }

        .mySwiper {
            height: 120px;
            display: flex;
            align-items: center;
            padding: 10px 0;
        }

        .mySwiper .swiper-slide {
            width: 100px;
            height: 100px;
            border-radius: 8px;
            overflow: hidden;
            opacity: 0.6;
            border: 2px solid transparent;
            transition: opacity 0.3s, border 0.3s;
        }

        .mySwiper .swiper-slide img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .mySwiper .swiper-slide-thumb-active {
            opacity: 1;
            border-color: #526652;
        }

        .swiper-button-next,
        .swiper-button-prev {
            background: #526652;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
            color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            transition: background 0.3s;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: #3e5041;
        }

        .swiper-button-next::after,
        .swiper-button-prev::after {
            font-size: 16px;
            font-weight: bold;
        }

        .popup {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.8);
            z-index: 1000;
            justify-content: center;
            align-items: center;
        }

        .popup-content {
            position: relative;
            max-width: 80%;
            max-height: 80%;
        }

        .popup-content img {
            width: 100%;
            height: 400px;
            object-fit: cover;
            border-radius: 10px;
        }

        .popup-close {
            position: absolute;
            top: -10px;
            right: -10px;
            background: #526652;
            color: #fff;
            width: 30px;
            height: 30px;
            text-align: center;
            line-height: 30px;
            font-size: 18px;
            border-radius: 50%;
            cursor: pointer;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }
    </style>
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
                <a href="{{ route('home') }}"><img style="width: 80px"  src="{{ asset('assets/website/images/hedab_master/logo_main.png') }}" alt="" title=""/></a>
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
    <section class="sidebar-page-container sec-pad" style="direction: rtl; padding-top: 180px;">
        <div class="auto-container">

            <nav style="--bs-breadcrumb-divider: '>'; background-color: #f9f9f9; padding: 10px; border-radius: 5px;"
                 aria-label="breadcrumb">
                <ol class="breadcrumb" style=" margin: 0; background-color: transparent; padding: 0;">
                    <li class="breadcrumb-item">
                        <a href="#" class="breadcrumb-item active">الرئيسية</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        العروض العقارية
                    </li>
                    <li class="breadcrumb-item" style="color: green; text-decoration: none; font-weight: bold;"
                        aria-current="page">
                        اسم العرض العقاري
                    </li>
                </ol>
            </nav>
        </div>
    </section>
    <!-- sidebar-page-container end -->


    <div class="container my-5">
        <!-- Slider الرئيسي -->
        <h3 class=" mb-4 " style="text-align: start;">
            {!! $offer->short_title !!}
        </h3>
        <div style="--swiper-navigation-color: #526652; --swiper-pagination-color: #526652"
             class="swiper mySwiper2">
            <div class="swiper-wrapper">
                @foreach($offer->gallery() as $media)
                    <div class="swiper-slide">
                        <img src="{{ $media->getFullUrl() }}" class="popup-trigger"/>
                    </div>
                @endforeach

            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>

        <!-- Slider الصور المصغرة -->
        <div thumbsSlider="" class="swiper mySwiper mt-4">
            <div class="swiper-wrapper">
                @foreach($offer->gallery() as $media)
                    <div class="swiper-slide">
                        <img src="{{ $media->getFullUrl() }}"/>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Popup للصورة -->
    <div id="popup" class="popup">
        <div class="popup-content">
            <span class="popup-close">&times;</span>
            <img id="popup-image" src="" alt="Popup Image"/>
        </div>
    </div>


    <div class="project-overview">
        <div class="container">
            <div class="col-lg-12 p-3 rounded-lg bg-light col-md-12 col-sm-12 content-column"
                 style="text-align: start;">
                <div class="content-box p_relative d_block ml_30">
                    <!-- العنوان الرئيسي -->
                    <h3 class="d_block fs_24 lh_30 mb_16" style="color: #001D00;">{!! $offer->title !!}</h3>

                    <!-- الوصف -->
                    <p class="lh_30 mb_14" style="color: #555;">{!! $offer->description !!}</p>

                    <ul class="project-info clearfix p_relative d_block mb_70">
                        <li class="p_relative fw_bold d_block fs_25 lh_30 mb_20">
                            <i class="fas fa-home ms-4"></i>
                            <h5 class="d_iblock fs_20 fw_bold w_200" style="color: #001D00;">
                                مواصفات العقار
                            </h5>
                        </li>
                        {!! $property_specifications->data !!}
                    </ul>

                    <ul class="project-info clearfix p_relative d_block mb_70">
                        <li class="p_relative fw_bold d_block fs_25 lh_30 mb_20">
                            <i class="fas fa-home ms-4"></i>
                            <h5 class="d_iblock fs_20 fw_bold w_200" style="color: #001D00;">
                                محتويات العقار
                            </h5>
                        </li>
                        {!! $property_contents->data !!}
                    </ul>

                    <div class="features-box mb_50">
                        <h4 class="fs_20 fw_bold mb_20" style="color: #001D00;">
                            <i class="fas fa-star ms-3"></i> مميزات العقار:
                        </h4>
                        {!! $property_features->data !!}
                    </div>

                    <div class="price-contact-box">
                        <h4 class="fs_20 fw_bold mb_20" style="color: #001D00;">
                            <i class="fas fa-money-bill-wave ms-3"></i> الأسعار وطرق التواصل:
                        </h4>
                        {!! $financial_communication->data !!}
                        <div class="contact-info my-3" style="color: #001D00;">
                            <p>
                                ------------------------------------------------------
                                <br>
                                شـركة قـدرة العقـارية
                                <br>
                                بقدراتنا المتنوعة،، نمكنك بالوصول لهدفك
                            </p>
                        </div>
                    </div>

                    <div class="btn-box d-flex align-items-center justify-content-center">
                        <a href="project-details.html" class="btn mr_11"
                           style="background-color: #001D00; color: #fff;">  {{ $offer->price }} ريال سعودي </a>

                        <a download="" href="{{ $offer->getBrochureUrl() }}" class="btn mr_11"
                           style="background-color: #526652; color: #fff;"><i class="fas fa-download fs_16"></i>
                            تنزيل البرشور
                        </a>
                        <a href="project-details.html" class="btn mr_11"
                           style="background-color: #001D00; color: #fff;"><i class="fas fa-phone fs_16"></i> إتصل
                            بنا
                        </a>
                        <a href="project-details.html" class="btn mr_11"
                           style="background-color: #526652; color: #fff;"><i class="fas fa-envelope fs_16"></i>
                            إتصل بنا
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @if($other_offers->count())
        <section class="p-4 mt-5">
            <div class="container">
                <div class="heading text-center font-weight-bold mb-3" style="color: #001D00; font-size: 40px;">
                    العقارات
                </div>
                <div class="row">


                    <!-- العقارات -->

                    <!-- Card 1 -->
                    <!-- <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="card realestate-card">
                                    <img src="https://via.placeholder.com/300x200" alt="Property"
                                        class="card-img-top" />
                                    <div class="card-body">
                                        <h5 class="card-title">شقة فاخرة في القاهرة</h5>
                                        <p class="card-text">3 حجرات - 2 حمامات</p>
                                        <span class="text-primary fw-bold">250,000$</span>
                                    </div>
                                </div>
                            </div> -->
                    <!--  -->
                    @foreach($other_offers as $other_offer)
                        <div class="col-lg-4 col-md-6 col-sm-12 news-block mt-4">
                            <div class="news-block-one wow fadeInUp animated" data-wow-delay="00ms"
                                 data-wow-duration="1500ms">
                                <div class="inner-box bg-color-1">
                                    <div class="image-box">
                                        <figure class="image">
                                            <a href="{{ route('offers.details', $other_offer) }}">
                                                <img src="{{ $other_offer->getThumbUrl() }}" alt=""/>
                                            </a>
                                        </figure>
                                        <span
                                            class="post-date">{{ strtoupper($other_offer->created_at->format('d M Y')) }}</span>
                                    </div>
                                    <div class="lower-content">
                                        <h3 style="text-align: center;">
                                            <a href="{{ route('offers.details', $other_offer) }}">Developing in 106
                                                Countries</a>
                                        </h3>
                                        <p style="text-align: center;">
                                            {!! $other_offer->short_title !!}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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

<!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

<!-- Initialize Swiper -->

<script>
    // تهيئة الـ Swiper
    const swiper = new Swiper('.mySwiper2', {
        loop: true,
        spaceBetween: 10,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
        thumbs: {
            swiper: {
                el: '.mySwiper',
                slidesPerView: 5,
                spaceBetween: 15,
            },
        },
    });

    // التعامل مع الـ Popup
    const popup = document.getElementById('popup');
    const popupImage = document.getElementById('popup-image');
    const closePopup = document.querySelector('.popup-close');
    const triggers = document.querySelectorAll('.popup-trigger');

    triggers.forEach(trigger => {
        trigger.addEventListener('click', function () {
            popupImage.src = this.src;
            popup.style.display = 'flex';
        });
    });

    closePopup.addEventListener('click', function () {
        popup.style.display = 'none';
    });

    // إغلاق الـ Popup عند الضغط خارجه
    window.addEventListener('click', function (e) {
        if (e.target === popup) {
            popup.style.display = 'none';
        }
    });
</script>
</body>
<!-- End of .page_wrapper -->

</html>
