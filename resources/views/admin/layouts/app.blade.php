<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <!--begin::Head-->
    <head>
    <meta charset="utf-8" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title><?php echo @$title; ?> | Yönetim Paneli</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, maximum-scale=1.0 minimal-ui" />
    <link rel="canonical" href="https://keenthemes.com/metronic" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->

    <link href="{{ asset('backend/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link href="{{ asset('backend/assets/css/pages/wizard/wizard-1.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/plugins/custom/prismjs/prismjs.bundle.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{ asset('backend/assets/css/themes/layout/header/base/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/themes/layout/header/menu/light.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/themes/layout/brand/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('backend/assets/css/themes/layout/aside/dark.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/css/style.css?v=2.1') }}" rel="stylesheet" type="text/css" />
    @stack('style')
    <style>
        .ucfirst {
            text-transform: capitalize;
        }
        .modal-dialog-scrollable .modal-content {
            max-height: calc(100vh - 1rem);
            overflow-y: scroll;
        }
        .table.table-head-custom thead th, .table.table-head-custom thead tr {
            letter-spacing: 0px;
        }
    </style>
</head>

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading {!! Auth()->user()->panel_type == 1 ? "aside-minimize":"" !!}">


<div class="d-flex flex-column flex-root">

    <div class="d-flex flex-row flex-column-fluid page">

        <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">

            <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">

                <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">

                    <ul class="menu-nav">
                        <li class="menu-item menu-item-submenu {{ Route::is('admin.profile.index') ||  Route::is('admin.profile.password') ? 'menu-item-active menu-item-open':'' }}" aria-haspopup="true" data-menu-toggle="hover">
                            <a href="{{ Route('admin.profile.index') }}" class="menu-link menu-toggle">
                                <span class="svg-icon menu-icon">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Shopping/Box2.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                    </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                                <span class="menu-text">Profil Bilgilerim</span>
                            </a>
                        </li>

                        <li class="menu-item {{ Route::is('todo.index') ? 'menu-item-active':'' }}" aria-haspopup="true">
                            <a href="{{ Route('todo.index') }}" class="menu-link">
                            <span class="svg-icon menu-icon">

                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                    <path d="M18,14 C16.3431458,14 15,12.6568542 15,11 C15,9.34314575 16.3431458,8 18,8 C19.6568542,8 21,9.34314575 21,11 C21,12.6568542 19.6568542,14 18,14 Z M9,11 C6.790861,11 5,9.209139 5,7 C5,4.790861 6.790861,3 9,3 C11.209139,3 13,4.790861 13,7 C13,9.209139 11.209139,11 9,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                    <path d="M17.6011961,15.0006174 C21.0077043,15.0378534 23.7891749,16.7601418 23.9984937,20.4 C24.0069246,20.5466056 23.9984937,21 23.4559499,21 L19.6,21 C19.6,18.7490654 18.8562935,16.6718327 17.6011961,15.0006174 Z M0.00065168429,20.1992055 C0.388258525,15.4265159 4.26191235,13 8.98334134,13 C13.7712164,13 17.7048837,15.2931929 17.9979143,20.2 C18.0095879,20.3954741 17.9979143,21 17.2466999,21 C13.541124,21 8.03472472,21 0.727502227,21 C0.476712155,21 -0.0204617505,20.45918 0.00065168429,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                </g>
                                </svg>

                            </span>
                                <span class="menu-text">Todo List</span>
                            </a>
                        </li>
                        </ul>
                </div>
            </div>

        </div>

        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">

            <div class="content {{ Route::is('admin.customer.add') ? 'pt-0':'' }} d-flex flex-column flex-column-fluid" id="kt_content">
                @yield('main')
            </div>

        </div>

    </div>

</div>

@include('admin.layouts.components.profile_menu')
@include('admin.layouts.components.quick_panel')


<script src="{{ asset('backend/assets/plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('backend/assets/plugins/custom/prismjs/prismjs.bundle.js') }}"></script>
<script src="{{ asset('\frameworks\ckeditor\ckeditor.js') }}"></script>
<script src="{{ asset('backend/assets/js/scripts.bundle.js') }}"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script src="{{ asset('admin/js/jquery.mask.min.js') }}"></script>
<script src="{{ asset('admin/js/jquery.validate.min.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/i18n/tr.js"></script>
<script src="{{ asset('admin/js/custom.js?v='.rand(0,10000)) }}"></script>
<script src="{{ asset('admin/js/todo.js?v='.rand(0,10000)) }}"></script>
</body>
<!--end::Body-->
</html>
