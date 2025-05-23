<nav
    class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item navbar-search-wrapper mb-0">
                <a class="nav-item nav-link search-toggler d-flex align-items-center px-0"
                   href="javascript:void(0);">
                </a>
            </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);"
                   data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{asset('assets/dashboard/assets/img/user.png')}}" alt
                             class="h-auto rounded-circle pull-up"/>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{asset('assets/dashboard/assets/img/user.png')}}" alt
                                             class="h-auto rounded-circle pull-up"/>
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">
                                        @auth
                                            {{Auth::user()->name}}
                                        @endauth

                                    </span>
                                    <small class="text-muted">
                                        @auth
                                            {{Auth::user()->email}}
                                        @endauth
                                    </small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('admin.profile.edit') }}">
                            <i class="ti ti-user-check me-2 ti-sm"></i>
                            <span class="align-middle">حسابي</span>
                        </a>
                    </li>
{{--                    <li>--}}
{{--                        <a class="dropdown-item" href="#">--}}
{{--                            <i class="ti ti-settings me-2 ti-sm"></i>--}}
{{--                            <span class="align-middle">Settings</span>--}}
{{--                        </a>--}}
{{--                    </li>--}}

                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <a class="dropdown-item" href="{{ route('logout') }}" style="text-align:start"
                               onclick="event.preventDefault();
                            this.closest('form').submit();">
                                <i class="ti ti-logout me-2 ti-sm"></i>
                                <span class="align-middle">تسجيل الخروج</span>
                            </a>
                        </form>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>

</nav>
