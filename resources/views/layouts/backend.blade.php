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
    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
</head>

<body>
<div class="app">
    <div class="layout">
        <!-- Side Nav START -->
        <div class="side-nav">
            <div class="side-nav-inner">
                <div class="side-nav-logo">
                    <a href="{{ route('base') }}">
                        <div class="logo logo-dark" style="background-image: url('assets/images/logo/logo.png')"></div>
                        <div class="logo logo-white" style="background-image: url('assets/images/logo/logo-white.png')"></div>
                    </a>
                    <div class="mobile-toggle side-nav-toggle">
                        <a href="#">
                            <i class="ti-arrow-circle-left"></i>
                        </a>
                    </div>
                </div>
                <ul class="side-nav-menu scrollable">
                    <li class="nav-item active">
                        <a class="mrg-top-30" href="index.html">
                                <span class="icon-holder">
										<i class="ti-home"></i>
									</span>
                            <span class="title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.html">
                            <span class="icon-holder">
                                <i class="ti-package"></i>
                            </span>
                            <span class="title">Portfolio</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="javascript:void(0);">
                                <span class="icon-holder">
										<i class="ti-palette"></i>
									</span>
                            <span class="title">Invest</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="index.html">
                            <span class="icon-holder">
                                <i class="ti-file"></i>
                            </span>
                            <span class="title">Payments</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="index.html">
                            <span class="icon-holder">
                                <i class="ti-layout-media-overlay"></i>
                            </span>
                            <span class="title">Account</span>
                        </a>
                    </li>
                    <li class="nav-item dropdown">
                        <a href="index.html">
                            <span class="icon-holder">
                                <i class="ei-log-in-alt"></i>
                            </span>
                            <span class="title">Logout</span>
                        </a>
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
                                <img class="profile-img img-fluid" src="assets/images/user.jpg" alt="">
                                <div class="user-info">
                                    <span class="name pdd-right-5">{{ Auth::user()->name }}</span>
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
``
<script src="{{ asset('assets/js/vendor.js') }}"></script>

<!-- page plugins js -->
<script src="{{ asset('assets/vendors/bower-jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('assets/js/maps/jquery-jvectormap-us-aea.js') }}"></script>
<script src="{{ asset('assets/vendors/d3/d3.min.js') }}"></script>
<script src="{{ asset('assets/vendors/nvd3/build/nv.d3.min.js') }}"></script>
<script src="{{ asset('assets/vendors/jquery.sparkline/index.js') }}"></script>
<script src="{{ asset('assets/vendors/chart.js/dist/Chart.min.js') }}"></script>

<script src="{{ asset('assets/js/app.min.js') }}"></script>

<!-- page js -->
<script src="{{ asset('assets/js/dashboard/dashboard.js') }}"></script>

</body>

</html>
