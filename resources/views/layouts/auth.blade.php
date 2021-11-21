<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <title>{{ config('app.name', 'Oasis Agro') }} - @yield('title')</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="assets/images/logo/favicon.png">

    <!-- plugins css -->
{{--    <link rel="stylesheet" href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.css') }}" />--}}
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/vendors/PACE/themes/blue/pace-theme-minimal.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendors/perfect-scrollbar/css/perfect-scrollbar.min.css') }}" />

    <!-- core css -->
    <link href="{{ asset('assets/css/ei-icon.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/themify-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/animate.min.css') }}" rel="stylesheet">

    <link href="{{ asset('assets/css/app.css') }}" rel="stylesheet">
</head>

<body>
<div class="app">
    <div class="authentication">
        <div class="sign-in-2">
            <div class="container-fluid no-pdd-horizon bg" style="background-image: url('assets/images/others/img-30.jpg')">
                <div class="row">
                    <div class="col-md-10 mr-auto ml-auto">
                        <div class="row">
                            <div class="mr-auto ml-auto full-height height-100 d-flex align-items-center">
                                <div class="vertical-align full-height">
                                    <div class="table-cell">
                                        <div class="card min-500">
                                            <div class="card-body">
                                                <div class="pdd-horizon-30 pdd-vertical-30">
                                                    <div class="mrg-btm-30">
                                                        <img class="img-responsive inline-block" src="{{ asset('assets/images/logo/logo.png') }}" alt="">
                                                        <h2 class="inline-block pull-right no-mrg-vertical pdd-top-15"> @yield('title')</h2>
                                                    </div>
                                                    @yield('content')
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="{{ asset('assets/js/vendor.js') }}"></script>
<script src="{{ asset('assets/js/app.min.js') }}"></script>
</body>
</html>
