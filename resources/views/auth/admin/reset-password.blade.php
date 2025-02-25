<!DOCTYPE html>

<html
    lang="ar"
    class="light-style customizer-hide"
    dir="rtl"
    data-theme="theme-default"
    data-assets-path="{{asset('assets/dashboard/assets')}}/"
    data-template="vertical-menu-template"
>
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>إستعاده كلمة المرور</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/dashboard/assets/img/Fav_logo.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com"/>
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin/>
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet"
    />

    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/vendor/fonts/fontawesome.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/vendor/fonts/tabler-icons.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/vendor/fonts/flag-icons.css') }}"/>

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css"/>
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css"/>
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/css/demo.css') }}"/>

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/vendor/libs/node-waves/node-waves.css') }}"/>
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/vendor/libs/typeahead-js/typeahead.css') }}"/>
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}"/>

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/dashboard/assets/vendor/css/pages/page-auth.css') }}"/>
    <!-- Helpers -->
    <script src="{{ asset('assets/dashboard/assets/vendor/js/helpers.js') }}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
    <script src="{{ asset('assets/dashboard/assets/vendor/js/template-customizer.js') }}"></script>
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{ asset('assets/dashboard/assets/js/config.js') }}"></script>
</head>

<body>
<!-- Content -->

<div class="container-xxl">
    <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner py-4">
            <!-- Reset Password -->
            <div class="card">
                <div class="card-body">
                    <!-- Logo -->
                    <div class="app-brand justify-content-center mb-4 mt-2">
                        <a href="/" class="app-brand-link gap-2">
                            <div class="logo-box">
                                <figure class="logo">
                                    <a href="/">
                                        <img src="{{ asset('assets/website/images/LOGO.png') }}" alt="">
                                    </a>
                                </figure>
                            </div>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <h4 class="mb-1 pt-2">إعادة تعيين كلمة المرور 🔒</h4>
                    <p class="mb-4">لـ <span class="fw-bold">john.doe@email.com</span></p>
                    <form id="formAuthentication" action="{{ route('password.store') }}" method="POST">
                        @csrf

                        <!-- Password Reset Token -->
                        <input type="hidden" name="token" value="{{ $request->route('token') }}">


                        <div class="mb-3">
                            <label for="email" class="form-label">البريد الإلكتروني</label>
                            <input
                                type="text"
                                class="form-control"
                                id="email"
                                name="email"
                                value="{{  old('email', $request->email) }}"
                                placeholder="أدخل بريدك الإلكتروني"
                                required
                            />

                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="password">كلمة المرور الجديدة</label>
                            <div class="input-group input-group-merge">
                                <input
                                    type="password"
                                    id="password"
                                    class="form-control"
                                    name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password"
                                    required
                                    autofocus
                                />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="mb-3 form-password-toggle">
                            <label class="form-label" for="confirm-password">تأكيد كلمة المرور</label>
                            <div class="input-group input-group-merge">
                                <input
                                    type="password"
                                    id="confirm-password"
                                    class="form-control"
                                    name="password_confirmation"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    required
                                    aria-describedby="password"
                                />
                                <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                            </div>

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <button class="btn btn-primary d-grid w-100 mb-3">تعيين كلمة المرور الجديدة</button>
                        <div class="text-center">
                            <a href="{{ route('login') }}">
                                <i class="ti ti-chevron-left scaleX-n1-rtl"></i>
                                العودة إلى تسجيل الدخول
                            </a>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Reset Password -->
        </div>
    </div>
</div>

<!-- / Content -->

<!-- Core JS -->
<!-- build:js assets/vendor/js/core.js -->
<script src="{{ asset('assets/dashboard/assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/libs/popper/popper.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/js/bootstrap.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/libs/node-waves/node-waves.js') }}"></script>

<script src="{{ asset('assets/dashboard/assets/vendor/libs/hammer/hammer.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/libs/i18n/i18n.js') }}"></script>
<script src="{{ asset('assets/dashboard/assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>

<script src="{{ asset('assets/dashboard/assets/vendor/js/menu.js') }}"></script>
<!-- endbuild -->

<!-- Vendors JS -->
{{--<script src="{{ asset('assets/dashboard/assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/dashboard/assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>--}}
{{--<script src="{{ asset('assets/dashboard/assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>--}}

<!-- Main JS -->
<script src="{{ asset('assets/dashboard/assets/js/main.js') }}"></script>

<!-- Page JS -->
<script src="{{ asset('assets/dashboard/assets/js/pages-auth.js') }}"></script>
</body>
</html>
