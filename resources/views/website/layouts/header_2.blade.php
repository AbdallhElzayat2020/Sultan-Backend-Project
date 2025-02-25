<header class="main-header header-style-one" style="background-color: #112e11;">
    <!-- header-lower -->
    <div class="header-lower">
        <div class="large-container">
            <div class="outer-box">
                <div class="logo-box">
                    <figure class="logo">
                        <a href="{{route('home')}}"><img src="{{asset('assets/website/images/Logo_master.png') }}" alt="logo" /></a>
                    </figure>
                </div>
                <div class="menu-area clearfix">
                    <!--Mobile Navigation Toggler-->
                    <div class="mobile-nav-toggler">
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                        <i class="icon-bar"></i>
                    </div>
                    <nav class="main-menu navbar-expand-md navbar-light">
                        <div class="collapse navbar-collapse show clearfix" id="navbarSupportedContent">
                            <ul class="navigation clearfix">
                                <li class="dropdown"><a href="#">EN</a>
                                    <ul>
                                        <li><a href="#">EN</a></li>
                                        <li><a href="#">AR</a></li>
                                    </ul>
                                </li>
                                <li class="#"><a href="{{route('contact')}}">تواصل معنا</a></li>

                                <li class="#"><a href="{{route('blogs')}}">المدونة</a></li>

                                <li class="dropdown"><a href="javascript:void(0)">التدريب والتوظيف</a>
                                    <ul>
                                        <li><a href="{{route('internship')}}">فرص التدريب</a></li>
                                        <li><a href="{{route('apply')}}">فرص التوظيف</a></li>
{{--                                        <li><a href="error.html">404</a></li>--}}
                                    </ul>
                                </li>
                                <li class="">
                                    <a href="{{route('services')}}">خدماتنا</a>
                                </li>
                                <li class="dropdown">
                                    <a href="{{route('offers')}}">العروض العقارية</a>
                                </li>
                                <li class="">
                                    <a href="{{route('about')}}">من نحن</a>
                                </li>
                                <li class="">
                                    <a href="{{route('home')}}">الرئيسية</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="nav-right">
                    <div class="support-box">
                        <a href="tel:+966541111426" class="theme-btn btn-one">تواصل معنا</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--sticky Header-->
    <div class="sticky-header">
        <div class="large-container">
            <div class="outer-box">
                <div class="logo-box">
                    <figure class="logo">
                        <a href="{{route('home')}}">
                            <img src="{{asset('assets/website/images/Logo_master.png') }}" alt="LOGO" /></a>
                    </figure>
                </div>
                <div class="menu-area clearfix">
                    <nav class="main-menu clearfix">
                        <!--Keep This Empty / Menu will come through Javascript-->
                    </nav>
                </div>
                <div class="nav-right">
                    <div class="support-box">
                        <!-- <div class="icon-box"><i class="far fa-phone"></i></div> -->
                        <a href="tel:+966541111426" class="theme-btn btn-one">تواصل معنا</a>

                        <!-- <h3><a href="tel:+966541111426">تواصل معنا</a></h3> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<div class="mobile-menu">
    <div class="menu-backdrop"></div>
    <div class="close-btn"><i class="fas fa-times"></i></div>

    <nav class="menu-box" style="direction: rtl; text-align: right">
        <div class="nav-logo">
            <a href="{{ route('home') }}"><img src="{{asset('assets/website/images/Logo_master.png') }}" alt="" title="" /></a>
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
                    <a href="#"><span class="fab fa-facebook-square"></span></a>
                </li>
                <li>
                    <a href="#l"><span class="fab fa-instagram"></span></a>
                </li>
                <li>
                    <a href="#"><span class="fab fa-youtube"></span></a>
                </li>
            </ul>
        </div>
    </nav>
</div>
