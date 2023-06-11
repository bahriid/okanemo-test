<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->
<head>
    <title>{{$tilte ?? 'Home'}} - Okanemo Store</title>
    <link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}"/>
    <!--begin::Fonts(mandatory for all pages)-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700"/>
    <!--end::Fonts-->
    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="{{asset('assets/plugins/custom/datatables/datatables.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Vendor Stylesheets-->
    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <!--end::Global Stylesheets Bundle-->
    @stack('styles')
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
    <style>
        [x-cloak] { display: none !important; }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body" data-kt-app-header-stacked="true" data-kt-app-header-primary-enabled="true"
      data-kt-app-header-secondary-enabled="false" data-kt-app-toolbar-enabled="true" class="app-default">
<!--begin::Theme mode setup on page load-->
<script>var defaultThemeMode = "light";
    var themeMode;
    if (document.documentElement) {
        if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
            themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
        } else {
            if (localStorage.getItem("data-bs-theme") !== null) {
                themeMode = localStorage.getItem("data-bs-theme");
            } else {
                themeMode = defaultThemeMode;
            }
        }
        if (themeMode === "system") {
            themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
        }
        document.documentElement.setAttribute("data-bs-theme", themeMode);
    }</script>
<!--end::Theme mode setup on page load-->
<!--begin::App-->
<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
    <!--begin::Page-->
    <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
        <!--begin::Header-->
        <div id="kt_app_header" class="app-header">
            <!--begin::Header primary-->
            <div class="app-header-primary border-bottom-1" data-kt-sticky="true"
                 data-kt-sticky-name="app-header-primary-sticky"
                 data-kt-sticky-offset="{default: 'false', lg: '300px'}">
                <!--begin::Header primary container-->
                <div class="app-container container-xxl d-flex align-items-stretch justify-content-between">
                    <!--begin::Logo and search-->
                    <div class="d-flex flex-grow-1 flex-lg-grow-0">
                        <!--begin::Logo wrapper-->
                        <div class="d-flex align-items-center me-7" id="kt_app_header_logo_wrapper">
                            <!--begin::Header toggle-->
                            <button
                                class="d-lg-none btn btn-icon btn-flex btn-color-gray-600 btn-active-color-primary w-35px h-35px ms-n2 me-2"
                                id="kt_app_header_menu_toggle">
                                <i class="ki-outline ki-abstract-14 fs-2"></i>
                            </button>
                            <!--end::Header toggle-->
                            <!--begin::Logo-->
                            <a href="{{route('home')}}" class="d-flex align-items-center me-lg-20 me-5">
                                <img alt="Logo" src="{{asset('assets/media/logos/demo-35-small.svg')}}"
                                     class="h-20px d-sm-none d-inline"/>
                                <img alt="Logo" src="{{asset('assets/media/logos/demo-35.svg')}}"
                                     class="h-20px h-lg-25px theme-light-show d-none d-sm-inline"/>
                                <img alt="Logo" src="{{asset('assets/media/logos/demo-35-dark.png')}}"
                                     class="h-20px h-lg-25px theme-dark-show d-none d-sm-inline"/>
                            </a>
                            <!--end::Logo-->
                        </div>
                        <!--end::Logo wrapper-->
                        <!--begin::Menu wrapper-->
                        <div class="app-header-menu app-header-mobile-drawer align-items-stretch" data-kt-drawer="true"
                             data-kt-drawer-name="app-header-menu" data-kt-drawer-activate="{default: true, lg: false}"
                             data-kt-drawer-overlay="true" data-kt-drawer-width="250px" data-kt-drawer-direction="start"
                             data-kt-drawer-toggle="#kt_app_header_menu_toggle" data-kt-swapper="true"
                             data-kt-swapper-mode="{default: 'append', lg: 'prepend'}"
                             data-kt-swapper-parent="{default: '#kt_app_body', lg: '#kt_app_header_wrapper'}">
                            <!--begin::Menu-->
                            <div
                                class="menu menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0"
                                id="kt_app_header_menu" data-kt-menu="true">
                                <!--begin:Menu item-->
                                <div
                                    class="menu-item {{request()->segment(1) == 'home' ? 'here show' : ''}} me-0 me-lg-2">
                                    <!--begin:Menu link-->
                                    <a class="menu-link py-3"
                                       href="{{route('home')}}">
                                        <span class="menu-title">Home</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <div
                                    class="menu-item me-0 me-lg-2 {{request()->segment(1) == 'product' ? 'here show' : ''}}">
                                    <!--begin:Menu link-->
                                    <a class="menu-link py-3"
                                       href="{{route('product.index')}}">
                                        <span class="menu-title">Product</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <div
                                    class="menu-item me-0 me-lg-2 {{request()->segment(1) == 'category' ? 'here show' : ''}}">
                                    <!--begin:Menu link-->
                                    <a class="menu-link py-3"
                                       href="{{route('category.index')}}">
                                        <span class="menu-title">Category</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <div
                                    class="menu-item me-0 me-lg-2 {{request()->segment(1) == 'setting' ? 'here show' : ''}}">
                                    <!--begin:Menu link-->
                                    <a class="menu-link py-3"
                                       href="#"
                                       target="_blank">
                                        <span class="menu-title">Setting</span>
                                    </a>
                                    <!--end:Menu link-->
                                </div>
                                <!--end:Menu item-->
                            </div>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu wrapper-->
                    </div>
                    <!--end::Logo and search-->
                    <!--begin::Navbar-->
                    <div class="app-navbar flex-shrink-0">
                        <!--begin::User menu-->
                        <div class="app-navbar-item ms-3 ms-lg-9" id="kt_header_user_menu_toggle">
                            <!--begin::Menu wrapper-->
                            <div class="d-flex align-items-center"
                                 data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent"
                                 data-kt-menu-placement="bottom-end">
                                <!--begin:Info-->
                                <div class="text-end d-none d-sm-flex flex-column justify-content-center me-3">
                                    <span class="text-gray-500 fs-8 fw-bold">Hello</span>
                                    <a href="#" class="text-gray-800 text-hover-primary fs-7 fw-bold d-block">Admin</a>
                                </div>
                                <!--end:Info-->
                                <!--begin::User-->
                                <div class="cursor-pointer symbol symbol symbol-circle symbol-35px symbol-md-40px">
                                    <img class="" src="{{asset('assets/media/avatars/300-2.jpg')}}" alt="user"/>
                                    <div
                                        class="position-absolute translate-middle bottom-0 mb-1 start-100 ms-n1 bg-success rounded-circle h-8px w-8px"></div>
                                </div>
                                <!--end::User-->
                            </div>
                            <!--begin::User account menu-->
                            <div
                                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                                data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <div class="menu-content d-flex align-items-center px-3">
                                        <!--begin::Avatar-->
                                        <div class="symbol symbol-50px me-5">
                                            <img alt="Logo" src="{{asset('assets/media/avatars/300-2.jpg')}}"/>
                                        </div>
                                        <!--end::Avatar-->
                                        <!--begin::Username-->
                                        <div class="d-flex flex-column">
                                            <div class="fw-bold d-flex align-items-center fs-5">{{auth()->user()->name}}
                                            </div>
                                            <a href="#"
                                               class="fw-semibold text-muted text-hover-primary fs-7">{{auth()->user()->email}}</a>
                                        </div>
                                        <!--end::Username-->
                                    </div>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu separator-->
                                <div class="separator my-2"></div>
                                <!--end::Menu separator-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5" data-kt-menu-trigger="{default: 'click', lg: 'hover'}"
                                     data-kt-menu-placement="left-start" data-kt-menu-offset="-15px, 0">
                                    <a href="#" class="menu-link px-5">
												<span class="menu-title position-relative">Mode
												<span class="ms-5 position-absolute translate-middle-y top-50 end-0">
													<i class="ki-outline ki-night-day theme-light-show fs-2"></i>
													<i class="ki-outline ki-moon theme-dark-show fs-2"></i>
												</span></span>
                                    </a>
                                    <!--begin::Menu-->
                                    <div
                                        class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                                        data-kt-menu="true" data-kt-element="theme-mode-menu">
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                               data-kt-value="light">
														<span class="menu-icon" data-kt-element="icon">
															<i class="ki-outline ki-night-day fs-2"></i>
														</span>
                                                <span class="menu-title">Light</span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                               data-kt-value="dark">
														<span class="menu-icon" data-kt-element="icon">
															<i class="ki-outline ki-moon fs-2"></i>
														</span>
                                                <span class="menu-title">Dark</span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                        <!--begin::Menu item-->
                                        <div class="menu-item px-3 my-0">
                                            <a href="#" class="menu-link px-3 py-2" data-kt-element="mode"
                                               data-kt-value="system">
														<span class="menu-icon" data-kt-element="icon">
															<i class="ki-outline ki-screen fs-2"></i>
														</span>
                                                <span class="menu-title">System</span>
                                            </a>
                                        </div>
                                        <!--end::Menu item-->
                                    </div>
                                    <!--end::Menu-->
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5 my-1">
                                    <a href="#" class="menu-link px-5">Account
                                        Settings</a>
                                </div>
                                <!--end::Menu item-->
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"
                                        class="menu-link px-5">Sign Out</a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::User account menu-->
                            <!--end::Menu wrapper-->
                        </div>
                        <!--end::User menu-->
                    </div>
                    <!--end::Navbar-->
                </div>
                <!--end::Header primary container-->
            </div>
            <!--end::Header primary-->
        </div>
        <!--end::Header-->
        <!--begin::Wrapper-->
        <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
            <!--begin::Wrapper container-->
            <div class="app-container container-xxl d-flex flex-row flex-column-fluid">
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->

                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar d-flex flex-stack py-4 py-lg-8">
                            <!--begin::Toolbar wrapper-->
                            <div class="d-flex flex-grow-1 flex-stack flex-wrap gap-2 mb-n10" id="kt_toolbar">
                                <!--begin::Page title-->
                                <div class="page-title d-flex flex-column justify-content-center flex-wrap me-3">
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex text-dark fw-bold fs-3 flex-column justify-content-center my-0">
                                        {{$title}}</h1>
                                    <!--end::Title-->
                                    <!--begin::Breadcrumb-->
                                    @if($breadcrumb)
                                        <x-layout.breadcrumb :list="$breadcrumb"/>
                                    @endif
                                    <!--end::Breadcrumb-->
                                </div>
                                <!--end::Page title-->
                            </div>
                            <!--end::Toolbar wrapper-->
                        </div>
                        <!--end::Toolbar-->
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            @yield('content')
                            {{ $slot ?? null }}
                        </div>
                    </div>
                    <!--end::Content wrapper-->
                    <!--begin::Footer-->
                    <div id="kt_app_footer"
                         class="app-footer align-items-center justify-content-center justify-content-md-between flex-column flex-md-row py-3 py-lg-6">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted fw-semibold me-1">{{now()->format('Y')}}&copy;</span>
                            <a href="https://okanemo.com" target="_blank" class="text-gray-800 text-hover-primary">Okanemo</a>
                        </div>
                        <!--end::Copyright-->
                    </div>
                    <!--end::Footer-->
                </div>
                <!--end:::Main-->
            </div>
            <!--end::Wrapper container-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::App-->
<!--begin::Scroll-top-->
<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <i class="ki-outline ki-arrow-up"></i>
</div>
<!--end::Scroll-top-->
<!--begin::Javascript-->
<script>
    window.addEventListener('modal-hide', event => {
        var target = event.detail.modal
        $('#' + target).modal('hide');
    })
    window.addEventListener('modal-show', event => {
        var target = event.detail.modal
        $('#' + target).modal('show');
    })
</script>
<script>var hostUrl = "{{('assets/')}}";</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="{{asset('assets/plugins/custom/datatables/datatables.bundle.js')}}"></script>
<!--end::Vendors Javascript-->
<!--end::Javascript-->
@stack('script')
@livewireScripts
</body>
<!--end::Body-->
</html>
