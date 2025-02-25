<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('admin.dashboard') }}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bold">QUDRAH</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        {{--        <li class="menu-item  open">--}}
        {{--            <a href="javascript:void(0);" class="menu-link menu-toggle">--}}
        {{--                <i class="menu-icon tf-icons ti ti-smart-home"></i>--}}
        {{--                <div data-i18n="Dashboards">Dashboards</div>--}}
        {{--                <div class="badge bg-label-primary rounded-pill ms-auto">3</div>--}}
        {{--            </a>--}}
        {{--            <ul class="menu-sub">--}}
        {{--                <li class="menu-item active">--}}
        {{--                    <a href="#" class="menu-link">--}}
        {{--                        <div data-i18n="Analytics">Analytics</div>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--                <li class="menu-item">--}}
        {{--                    <a href="#" class="menu-link">--}}
        {{--                        <div data-i18n="CRM">CRM</div>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--                <li class="menu-item">--}}
        {{--                    <a href="#" class="menu-link">--}}
        {{--                        <div data-i18n="eCommerce">eCommerce</div>--}}
        {{--                    </a>--}}
        {{--                </li>--}}
        {{--            </ul>--}}
        {{--        </li>--}}

        <!-- Apps & Pages -->
        {{--        <li class="menu-header small text-uppercase">--}}
        {{--            <span class="menu-header-text">Home</span>--}}
        {{--        </li>--}}

        <li class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
            <a href="{{route('admin.dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-home"></i>
                <div data-i18n="Email">الرئيسية</div>
            </a>
        </li>

        @can('view-blogs')
            <li class="menu-item {{ request()->is('admin/blogs*') ? 'active' : '' }}">
                <a href="{{route('admin.blogs.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-book"></i>
                    <div data-i18n="Home">المدونة الالكترونية</div>
                </a>
            </li>
        @endcan

        @can('view-offers')
            <li class="menu-item {{ request()->is('admin/offers*') ? 'active' : '' }}">
                <a href="{{route('admin.offers.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-building"></i>
                    <div data-i18n="Home">العروض العقارية</div>
                </a>
            </li>
        @endcan

        @can('view-contacts')
            <li class="menu-item {{ request()->is('admin/contacts*') ? 'active' : '' }}">
                <a href="{{route('admin.contacts.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-message"></i>
                    <div data-i18n="Home">رسائل التواصل</div>
                </a>
            </li>
        @endcan

        @can('view-services')
            <li class="menu-item {{ request()->is('admin/services*') ? 'active' : '' }}">
                <a href="{{route('admin.services.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-components"></i>
                    <div data-i18n="Home">الخدمات</div>
                </a>
            </li>
        @endcan

        @can('view-testimonials')
            <li class="menu-item {{ request()->is('admin/testimonials*') ? 'active' : '' }}">
                <a href="{{route('admin.testimonials.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-id"></i>
                    <div data-i18n="Home">اراء العملاء</div>
                </a>
            </li>
        @endcan

        @can('view-mail-subscriptions')
            <li class="menu-item {{ request()->is('admin/mail-subscriptions') ? 'active' : '' }}">
                <a href="{{route('admin.mail-subscriptions.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-mail"></i>
                    <div data-i18n="Home">اشتراكات البريد</div>
                </a>
            </li>
        @endcan

        @can('view-partners')
            <li class="menu-item {{ request()->routeIs('admin.partners.*') ? 'active' : '' }}">
                <a href="{{route('admin.partners.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-mail"></i>
                    <div data-i18n="Home">الشركاء</div>
                </a>
            </li>
        @endcan

        @can('view-partners')
            <li class="menu-item {{ request()->routeIs('admin.clients.*') ? 'active' : '' }}">
                <a href="{{route('admin.clients.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-mail"></i>
                    <div data-i18n="Home">العملاء</div>
                </a>
            </li>
        @endcan

        @can('view-opportunities')
            <li class="menu-item {{ request()->routeIs('admin.opportunities.*') ? 'active' : '' }}">
                <a href="{{route('admin.opportunities.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-color-swatch"></i>
                    <div data-i18n="Home">الفرص</div>
                </a>
            </li>
        @endcan

        @canany(['view-users', 'view-roles'])
            <li class="menu-header small text-uppercase">
                <span class="menu-header-text">الإعدادات</span>
            </li>

            @can('view-users')
                <li class="menu-item {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <a href="{{route('admin.users.index')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-users"></i>
                        <div data-i18n="Home">المستخدمين</div>
                    </a>
                </li>
            @endcan

            @can('view-roles')
                <li class="menu-item {{ request()->routeIs('admin.roles.*') ? 'active' : '' }}">
                    <a href="{{route('admin.roles.index')}}" class="menu-link">
                        <i class="menu-icon tf-icons ti ti-settings"></i>
                        <div data-i18n="Home">الادوار</div>
                    </a>
                </li>
            @endcan
        @endcanany
    </ul>
</aside>
