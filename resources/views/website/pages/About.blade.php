<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">

<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>

    <title>من نحن</title>

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

    <section class="page-title p_relative centred"
             style="background-image: url('{{asset('assets/website/images/banner/Home_2.png')}}');
                background-position: center;
                display: flex;
                align-items: center;
                justify-content: center;
                height: 650px;">
        <div class="bg-layer p_absolute r_100 t_0"></div>
        <div class="large-container">
            <div class="content-box p_relative d_block z_5">
                <div class="title mb_25">
                    <h1 class="d_block fs_40 lh_76 color_white fw_exbold">عن قدرة العقارية</h1>
                </div>
            </div>
        </div>
    </section>


    <section class="about-style-three p_relative sec-pad" style="padding-top: 50px;">
        <div class="large-container">
            <div class="row clearfix">
                <div class="col-lg-6 col-md-12 col-sm-12 content-column">
                    <div class="content_block_5">
                        <div class="content-box p_relative d_block mr_90">
                            <div class="sec-title">
                                <h2 class="p_relative d_block fs_25 lh_60 fw_bold"
                                    style="color: #526652; text-align: start">
                                    عن قدرة العقارية
                                </h2>
                            </div>

                            <div class="text p_relative d_block mb_30">
                                <ul style="list-style: bullet;">
                                    <li style="color: #001d00; text-align: start; line-height: 2.2rem;">
                                        <b style="font-weight: 800;">-</b>
                                        تأسست <span style=" color: #C19C6E;">قدرة العقارية</span> في عام 2021م ,
                                        وبفضل خبرة فريق إدارتهـا
                                        الذي يمتلك خبرة
                                        في <span style="color: #C19C6E;">السوق العقاري</span>
                                        لأكثر من عشرين عاما استطاعت
                                        قدرة العقارية
                                        ان تثبت نفسها كاسم موثوق
                                        في فترة قصيرة يستند الي
                                        اعلى معايير الجودة والإحترافية
                                    </li>
                                    <br>
                                    <li style="color: #001d00; text-align: start; line-height: 2.2rem;">
                                        <b style="font-weight: 800;">-</b>
                                        ﺗﺴﻌﻰ "قدرة العقارية " جاهدة لتلبية احتياجات ﻋﻤﻼﺋﻬﺎ وتحقيق أﻫﺪاﻓـﻬـﻢ
                                        اﻻﺳـﺘـﺜﻤـﺎرﻳـﺔ في مجال العقارات
                                    </li>
                                    <br>
                                    <li style="color: #001d00; text-align: start; line-height: 2.2rem;">
                                        <b style="font-weight: 800;">-</b>
                                        تعتبر "قدرة العقارية" من اواهل الشركات المرخصة والمنصفة والمصنفة من قبل
                                        الهيئة العقارية في المملكة العربية السعودية
                                    </li>
                                    <br>
                                    <li style="color: #001d00; text-align: start; line-height: 2.2rem;">
                                        <b style="font-weight: 800;">-</b>
                                        كما تقدم مجموعة واسعة من الخدمات في المجال العقاري بما في ذالك
                                        <span style="color: #C19C6E;">
                                                التسويق العقاري , الاستشارات العقارية , اتحاد الملاك , المزادات العقارية
                                                , ادارة
                                                وتشغيل العقارات
                                            </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 image-column">
                    <div class="image-box p_relative d_block pr_120 pb_150">
                        <figure class="image image-1 p_relative d_block z_1 paroller"><img
                                src="{{ asset('assets/website/images/About.png') }}" alt="qudrah IMG">
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="about  p_relative">
        <div class="container">
            <div class="row justify-content-between" style="gap: 15px">
                <div class="col-lg-12">
                    <div class="about_section">
                        <div class="about_content">
                            <h4>رؤيتنا</h4>
                            <p>
                                أن تُصبح <span>"قدرة العقارية"</span> الرائدة في المجال العقاري من خلال تحقيق الرؤية
                                التامة
                                لعملائها عبر تقديم مجموعة متكاملة من الخدمات المتميزة التي تحافظ على استدامة الأصول
                                العقارية
                                وتحقيق العوائد المرجوة.
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-12">
                    <div class="about_section">
                        <div class="about_content">
                            <h4>رسالتنا</h4>
                            <p>
                                في <span>"قدرة العقارية"</span> نُقدم لك خدمات عقارية متكاملة وفعّالة مُصممة لتلبية
                                تطلعات عملائها، مع التركيز على تقديم تجربة إستثنائية تُضيف قيمة حقيقة عملائها.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="feature-style-two p_relative sec-pad">
        <div class="intro text-center mb-5">
            <div class="heading text-center font-weight-bold mb-3" style="color: #001d00; font-size: 40px">
                لماذا تختار قدرة
            </div>
        </div>
        <div class="large-container">
            <div class="row clearfix">
                <div class="col-lg-4 col-md-6 col-sm-12 feature-block mt-3">
                    <div class="feature-block-two wow fadeInUp animated" data-wow-delay="00ms"
                         data-wow-duration="1500ms">
                        <div
                            class="inner-box p_relative text-center d_block bg_white b_shadow_6 pt_60 pr_45 pb_55 pl_45 tran_5">
                            <div class="icon-box p_relative d_block fs_100 lh_100 green_color mb_25 tran_5">
                                <img src="{{ asset('assets/website/images/مرخصة_ومعتمدة.png') }}" alt="مرخصة ومعتمدة"/>
                            </div>
                            <h3 class="d_block fs_20 lh_30 fw_exbold mb_25 pb_25">
                                <a href="index-3.html" class="d_iblock color_black hov_color"
                                   style="color: #526652 !important">‫مرخصة‫ومعتمدة</a>
                            </h3>
                            <p class="text-center">
                                ‫تعتبر‬‫شركة‬ ‫قدرة‬ ‫العقارية‬ ‫من‬ ‫أوائل‬ ‫الشركات‬
                                ‫المرخصة‬ ‫والمصنفة‬ ‫من‬ ‫قبل‬ ‫الهيئة‬ ‫العامة‬ ‫للعقار‬
                                ‫في‬ ‫المملكة‬ ‫العربية‬ ‫السعودية‬
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 feature-block mt-3">
                    <div class="feature-block-two wow fadeInUp animated" data-wow-delay="00ms"
                         data-wow-duration="1500ms">
                        <div
                            class="inner-box p_relative text-center d_block bg_white b_shadow_6 pt_60 pr_45 pb_55 pl_45 tran_5">
                            <div class="icon-box p_relative d_block fs_100 lh_100 green_color mb_25 tran_5">
                                <img src="{{ asset('assets/website/images/الابتكار_والتطوير.png') }}"
                                     alt="الابتكار_والتطوير"/>
                            </div>
                            <h3 class="d_block fs_20 lh_30 fw_exbold mb_25 pb_25">
                                <a href="index-3.html" class="d_iblock color_black hov_color"
                                   style="color: #526652 !important">الابتكار والتطوير</a>
                            </h3>
                            <p class="text-center">
                                ‫تدمج‬‫قدرة‬ ‫العقارية‬ ‫التقنيات‬ ‫الحديثة‬ ‫في‬ ‫جميع‬
                                ‫مراحل‬ ‫الخدمات‬ ‫العقارية‬ ‫لتحسين‬ ‫عمليات‬
                                ‫ه‬‫ا‬‫وتقديم‬ ‫حلول‬ ‫جديدة‬ ‫وفعالة‬
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 col-sm-12 feature-block mt-3">
                    <div class="feature-block-two wow fadeInUp animated" data-wow-delay="00ms"
                         data-wow-duration="1500ms">
                        <div
                            class="inner-box p_relative text-center d_block bg_white b_shadow_6 pt_60 pr_45 pb_55 pl_45 tran_5">
                            <div class="icon-box p_relative d_block fs_100 lh_100 green_color mb_25 tran_5">
                                <img src="{{ asset('assets/website/images/الكفاءة_والاحترافية.png') }}"
                                     alt="الكفاءة_والاحترافية"/>
                            </div>
                            <h3 class="d_block fs_20 lh_30 fw_exbold mb_25 pb_25">
                                <a href="index-3.html" class="d_iblock color_black hov_color"
                                   style="color: #526652 !important">‫الكفاءة ‬‫واالحترافية‬</a>
                            </h3>
                            <p class="text-center">
                                ‫بسلسلة‬‫من‬ ‫الممارسات‬ ‫االحترافية‬ ‫المستدامة‪،‬‬ ‫تمكن‬
                                ‫قدرة‬ ‫العقارية‬ ‫من‬ ‫رفع‬ ‫الكفاءة‬ ‫التشغيلية‬ ‫للعقار‬
                                ‫وإطالة‬ ‫العمر‬ ‫الفعلي‬
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12 feature-block mt-3">
                    <div class="feature-block-two wow fadeInUp animated" data-wow-delay="00ms"
                         data-wow-duration="1500ms">
                        <div
                            class="inner-box p_relative text-center d_block bg_white b_shadow_6 pt_60 pr_45 pb_55 pl_45 tran_5">
                            <div class="icon-box p_relative d_block fs_100 lh_100 green_color mb_25 tran_5">
                                <img src="{{ asset('assets/website/images/النزاهة.png') }}" alt="النزاهة"/>
                            </div>
                            <h3 class="d_block fs_20 lh_30 fw_exbold mb_25 pb_25">
                                <a href="index-3.html" class="d_iblock color_black hov_color"
                                   style="color: #526652 !important">‫النزاهة</a>
                            </h3>
                            <p class="text-center">
                                ‫نتمسك‬‫بأعلى‬ ‫المعايير‬ ‫األخالقية‬ ‫والشفافية‬ ‫في‬
                                ‫جميع‬ ‫تعامالتنا‬ ‫مع‬ ‫عمالئنا‬
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 feature-block mt-3">
                    <div class="feature-block-two wow fadeInUp animated" data-wow-delay="00ms"
                         data-wow-duration="1500ms">
                        <div
                            class="inner-box p_relative text-center d_block bg_white b_shadow_6 pt_60 pr_45 pb_55 pl_45 tran_5">
                            <div class="icon-box p_relative d_block fs_100 lh_100 green_color mb_25 tran_5">
                                <img src="{{ asset('assets/website/images/المسؤلية_والثقة.png') }}"
                                     alt="المسؤلية_والثقة"/>
                            </div>
                            <h3 class="d_block fs_20 lh_30 fw_exbold mb_25 pb_25">
                                <a href="index-3.html" class="d_iblock color_black hov_color"
                                   style="color: #526652 !important">‫المسؤولية‬‫والثقة</a>
                            </h3>
                            <p class="text-center">
                                ‫نسعى ‬‫لبناء‬ ‫علاقات‬ ‫متينة‬ ‫مع‬ ‫عمالئنا‬ ‫وشركاء‬
                                ‫األعمال‬ ‫عبر‬ ‫تقديم‬ ‫األولية‬ ‫القصوى‬ ‫ل‬
                                ‫مصالح‬‫هم‬‫المتنوعة‬
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="vision-mission-section p_relative">
        <div class="container">
            <div class="heading text-center font-weight-bold mb-3" style="color: #001d00; font-size: 40px">
                اهدافنا
            </div>
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6 col-md-12">
                    <div class="vision-card">
                        <div class="vision-content">
                            <h4 style="color: #C19C6E;">رضا العملاء</h4>
                            <p>
                                تقديم خدمة إستثنائية لعملائنا وتلبية إحتياجاتهم وتحقيق تطلعاتهم
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 col-md-12">
                    <div class="vision-card">
                        <div class="vision-content">
                            <h4 style="color: #C19C6E;">الجودة والتميز</h4>
                            <p>
                                تحقيق أعلى مستويات الجودة والتميز في الخدمات العقارية
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="vision-card">
                        <div class="vision-content">
                            <h4 style="color: #C19C6E;">الشراكات الإستراتيجية</h4>
                            <p>
                                تطوير شراكات إستراتيجية مع الشركات والجهات الحكومية لتعزيز قدراتنا وتوسيع نطاقنا
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12">
                    <div class="vision-card">
                        <div class="vision-content">
                            <h4 style="color: #C19C6E;">إستدامة العقار</h4>
                            <p>
                                بتقديم إهتماماً كبيراً لصيانة وإدارة العقارات بطريقة تضمن إستدامتها لفترة طويلة </p>
                        </div>
                    </div>
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
