<!DOCTYPE html>
<html lang="en-US" class="no-js">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- ==============================================
    TITLE AND META TAGS
    =============================================== -->
    <title>{{ config('app.name', 'Oasis Agro') }} - @yield('title')</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Quickdev">
    <meta name="theme-color" content="#EEC344">

    <!-- ==============================================
    FAVICON
    =============================================== -->
    <link rel="shortcut icon" href="{{ asset('img/master/favicon.png') }}">

    <!-- ==============================================
    CSS
    =============================================== -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">--}}
    <link rel="stylesheet" href="{{ asset('css/timeline.css') }}">
    <link rel="stylesheet" href="{{ asset('css/stylesheet.css') }}">
    <link rel="stylesheet" href="{{ asset('css/home-4-styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('fonts/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/slick.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href='{{ asset('css/animation.aos.min.css') }}'>
    <link rel="stylesheet" href="{{ asset('css/animate.min.css') }}">

    <script src="{{ asset('js/modernizr-custom.js') }}"></script>

    <script>document.getElementsByTagName("html")[0].className += " js";</script>
</head>

<body>

<!-- LOADER -->
<div id="loader-wrapper">
    <div class="loader">
        <div class="square" ></div>
        <div class="square"></div>
        <div class="square last"></div>
        <div class="square clear"></div>
        <div class="square"></div>
        <div class="square last"></div>
        <div class="square clear"></div>
        <div class="square "></div>
        <div class="square last"></div>
    </div>
</div>
<!-- LOADER -->

<!--HEADER START-->
<header>
    <!--NAVIGATION-->
    <div class="main-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{ url('/') }}"><div class="logo-brand"><img src="{{ asset('img/master/logo.png') }}" alt=""></div></a>
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar top-bar"></span>
                    <span class="icon-bar middle-bar"></span>
                    <span class="icon-bar bottom-bar"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a class="nav-link" href=" {{ url('/') }}" >HOME</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('about') }}">ABOUT</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products') }}">OUR PRODUCTS</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('faq') }}">FAQ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contact-us') }}">CONTACT</a>
                        </li>
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">REGISTER</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">LOGIN</a>
                            </li>
                        @else
                            <li class="nav-item">
                                @if (strtolower(\Illuminate\Support\Facades\Auth::user()->getRole()) == 'administrator')
                                    <a class="nav-link" href="{{ route('admin.index') }}">MY ACCOUNT</a>
                                @elseif (strtolower(\Illuminate\Support\Facades\Auth::user()->getRole()) == 'super administrator')
                                    <a class="nav-link" href="{{ route('super.index') }}">MY ACCOUNT</a>
                                @else
                                    <a class="nav-link" href="{{ route('client.index') }}">MY ACCOUNT</a>
                                @endif
                            </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </div>
    </div>
    <!--NAVIGATION END-->
</header>
@yield('content')

<div class="modal fade" id="default-modal">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="row no-gutters">
                <div class="col-md-6 d-flex">
                    <div class="modal-body p-5 img d-flex" style="background-image: url('http://oasis.test/img/images/cucumber.jpg');">
                    </div>
                </div>
                <div class="col-md-6 d-flex">
                    <div class="modal-body p-5 d-flex align-items-center">
                        <form id="dope-contact-form-2" method="post">
                            @csrf
                            <div class="messages"></div>
                            <div class="controls">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input id="form_name" type="text" name="name" class="form-control customize" placeholder="Name" required="required" data-error="Firstname is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input id="form_email" type="email" name="email" class="form-control customize" placeholder="Email address" required="required" data-error="Valid email is required.">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input id="form_phone" type="tel" name="phone_number" class="form-control customize" placeholder="Please enter your phone">
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <textarea id="form_message" name="message" class="form-control customize" placeholder="How did you hear about us" rows="4" required="required" data-error="Please,leave us a message."></textarea>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <p><button type="submit" class="btn btn-custom" id="submit-btn-2">Send message</button></p>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="footer-col">
                    <a href="{{ url('/') }}">
                        <figure class="footer-logo"><img src="{{asset('img/master/logo.png')}}" alt=""></figure>
                    </a>
                    <p>Contributing to the sustainable development of food production in Nigeria</p>
                    <p class="copyright">© {{ date('Y') }} {{ config('app.name', 'Oasis Agro') }}</p>
                </div>
            </div>
            <div class="col-lg-3 footer-center-col">
                <h4>FIND US</h4>
                <div class="location">
                    <p>Address:  {!!  config('app.address') !!}</p>
                    <div class="d-flex">
                        <p>Phone: </p>
                        <div>
                            <p>{!! config('app.phone1') !!}</p>
{{--                            <p>{!! config('app.phone2') !!}</p>--}}
                        </div>
                    </div>
                    <p>Email: {!! strtoupper(config('app.email')) !!}</p>
                </div>
            </div>
            <div class="col-lg-4 footer-col-right">
                <h4>NEWSLETTER</h4>
                <div class="newsletter-box">
                    <p>Subscribe to our newsletter and get the latest scoop right to your inbox!</p>
                    <form  action="#" method="post" name="sign-up">
                        <input type="email" class="input" id="email" name="email" placeholder="Your email address" required>
                        <input type="submit" class="button" id="submit" value="SIGN UP">
                    </form>
                </div>
                <p class="cursive">Your email is safe with us, we don't spam.</p>
            </div>
        </div>
    </div>
</footer>
<!--FOOTER END-->

<!--SCROLL TOP START-->
<a href="#0" class="cd-top">Top</a>
<!--SCROLL TOP START-->

<!-- ==============================================
JAVASCRIPTS
=============================================== -->
<script src="{{ mix('js/app.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<script src="{{ asset('js/agrom.js') }}"></script>
<script src="{{ asset('js/util.js') }}"></script>
<script src="{{ asset('js/swipe-content.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>
<script>
    setTimeout(function() {
        $('#default-modal').modal({
            'show':true,
            'backdrop':'static'
        });
    }, 2000);
</script>

@yield('scripts')

</body>
</html>
