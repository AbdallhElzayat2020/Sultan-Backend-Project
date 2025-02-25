@include('website.layouts.head')

<div class="boxed_wrapper">
    {{--preloader--}}
    @include('website.layouts.preloader')
    {{--Header--}}

{{--    @include('website.layouts.header')--}}
    {{-- ('content')--}}
    @yield('content')
    {{--footer--}}
    @include('website.layouts.footer')

    {{--Scroll to top--}}
    <button class="scroll-top scroll-to-target" data-target="html">
        <span class="fal fa-long-arrow-up"></span>
    </button>
</div>

@include('website.layouts.scripts')

