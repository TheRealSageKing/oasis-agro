<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <title>{{ config('app.name', 'Oasis Agro') }} - @yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/logo/favicon.png') }}">

    <!-- plugins css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/PACE/themes/blue/pace-theme-minimal.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/css/perfect-scrollbar.min.css') }}" />

    <!-- page plugins css -->
    <link rel="stylesheet" href="{{ asset('assets/vendors/bower-jvectormap/jquery-jvectormap-1.2.2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/nvd3/build/nv.d3.min.css') }}" />

    <!-- core css -->
    <link href="{{ asset('assets/css/ei-icon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/plugins.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/toastr.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/backend-app.css') }}" rel="stylesheet">



</head>

<body>
<div class="app">
    <div class="layout">
        <!-- Side Nav START -->
        <div class="side-nav">
            <div class="side-nav-inner">
                <div class="side-nav-logo">
                    <a href="{{ url('/dashboard') }}">
                        <div class="logo logo-dark" style="background-image: url({{asset('assets/images/logo/logo.png')}})"></div>
                    </a>
                    <div class="mobile-toggle side-nav-toggle">
                        <a href="#">
                            <i class="ti-arrow-circle-left"></i>
                        </a>
                    </div>
                </div>
                <ul class="side-nav-menu scrollable">
                    <li class="nav-item  {{ (request()->is('oasis-admin/dashboard')) ? 'active' : '' }}">
                        <a class="mrg-top-30" href="{{ route('admin.index') }}">
                                <span class="icon-holder">
										<i class="ti-home"></i>
									</span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('oasis-admin/packages')) || (request()->is('oasis-admin/packages/*')) ? 'active' : '' }}">
                        <a href="{{ route('admin.packages.index') }}">
                            <span class="icon-holder">
                                <i class="ti-package"></i>
                            </span>
                            <span class="title">Packages</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('oasis-admin/investments')) || (request()->is('oasis-admin/investments/*')) ? 'active' : '' }}">
                        <a href="{{ route('admin.investments.index') }}">
                                <span class="icon-holder">
										<i class="ti-palette"></i>
									</span>
                            <span class="title">Investments</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('oasis-admin/customers')) || (request()->is('oasis-admin/customers/*')) ? 'active' : '' }}">
                        <a href="{{ route('admin.customers.index') }}">
                                <span class="icon-holder">
										<i class="ei-smiley"></i>
									</span>
                            <span class="title">Customers</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('oasis-admin/payments')) || (request()->is('oasis-admin/payments/*')) ? 'active' : '' }}">
                        <a href="{{ route('admin.payments.index') }}">
                            <span class="icon-holder">
                                <i class="ti-file"></i>
                            </span>
                            <span class="title">Payments</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('oasis-admin/my-account')) ? 'active' : '' }}">
                        <a href="{{ route('admin.account.index') }}">
                            <span class="icon-holder">
                                <i class="ti-layout-media-overlay"></i>
                            </span>
                            <span class="title">Account</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            <span class="icon-holder">
                                <i class="ei-log-in-alt"></i>
                            </span>
                            <span class="title">Logout</span>
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!-- Side Nav END -->

        <!-- Page Container START -->
        <div class="page-container">
            <!-- Header START -->
            <div class="header navbar">
                <div class="header-container">
                    <ul class="nav-left">
                        <li>
                            <a class="side-nav-toggle" href="javascript:void(0);">
                                <i class="ti-view-grid"></i>
                            </a>
                        </li>
                    </ul>
                    <ul class="nav-right">
                        <li class="user-profile dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img class="profile-img img-fluid" src="{{ asset('assets/images/user.jpg') }}" alt="">
                                <div class="user-info">
                                    <span class="name pdd-right-5">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                    <i class="ti-angle-down font-size-10"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a href="#">
                                        <i class="ti-settings pdd-right-10"></i>
                                        <span>Setting</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-user pdd-right-10"></i>
                                        <span>Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="ti-email pdd-right-10"></i>
                                        <span>Inbox</span>
                                    </a>
                                </li>
                                <li role="separator" class="divider"></li>
                                <li>
                                    <a href="#">
                                        <i class="ti-power-off pdd-right-10"></i>
                                        <span>Logout</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Header END -->

            <!-- Content Wrapper START -->
            <div class="main-content">
                <div class="container-fluid">
                    @yield('content')
                </div>
                <div class="modal slide-in-right modal-right fade" id="side-modal-r">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            @yield('side-modal-content')
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="default-modal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            @yield('modal-content')
                        </div>
                    </div>
                </div>

            </div>
            <!-- Content Wrapper END -->

            <!-- Footer START -->
            <footer class="content-footer">
                <div class="footer">
                    <div class="copyright">
                        <span>Copyright © <?php echo date('Y') ?> <b class="text-dark"> SageTech</b>. All rights reserved.</span>
                        <span class="go-right">
                            <a href="#" class="text-gray mrg-right-15">Term &amp; Conditions</a>
                            <a href="#" class="text-gray">Privacy &amp; Policy</a>
                        </span>
                    </div>
                </div>
            </footer>
            <!-- Footer END -->

        </div>
        <!-- Page Container END -->

    </div>
</div>


{{--<script src="{{ asset('assets/js/vendor.js') }}"></script>--}}

<script src="{{ mix('assets/js/backend-plugins.js') }}"></script>
<script src="{{ mix('js/app.js') }}"></script>
<!-- page plugins js -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>

<!-- page js -->
{{--<script src="{{ asset('assets/js/dashboard/dashboard.js') }}"></script>--}}



@yield('scripts')

</body>

</html>
