<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">
    <title>Rumble - Car Rental Booking HTML Template | @yield('title-menu')</title>
    <!-- Fav and touch icons -->
    {{-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon.ico">
	<link rel="apple-touch-icon-precomposed" href="assets/images/favicon.ico"> --}}
    <link rel="shortcut icon" href="{{ asset('assets/frontend/assets/images/favicon.jpg') }}">
    <!-- Bootstrap -->
    <link href="{{ asset('assets/frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Fontawesome -->
    <link href="{{ asset('assets/frontend/assets/css/font-awesome.css') }}" rel="stylesheet">
    <!-- Flaticons -->
    <link href="{{ asset('assets/frontend/assets/css/font/flaticon.css') }}" rel="stylesheet">
    <!-- Slick Slider -->
    <link href="{{ asset('assets/frontend/assets/css/slick.css') }}" rel="stylesheet">
    <!-- Range Slider -->
    <link href="{{ asset('assets/frontend/assets/css/ion.rangeSlider.min.css') }}" rel="stylesheet">
    <!-- Datepicker -->
    <link href="{{ asset('assets/frontend/assets/css/datepicker.css') }}" rel="stylesheet">
    <!-- magnific popup -->
    <link href="{{ asset('assets/frontend/assets/css/magnific-popup.css') }}" rel="stylesheet">
    <!-- Nice Select -->
    <link href="{{ asset('assets/frontend/assets/css/nice-select.css') }}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('assets/frontend/assets/css/style.cs') }}s" rel="stylesheet">
    <!-- Custom Responsive -->
    <link href="{{ asset('assets/frontend/assets/css/responsive.css') }}" rel="stylesheet">
    <!-- CSS for IE -->
    <!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]><script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script><![endif]-->
    <!-- place -->
</head>

<body>
    <div class="loader go"></div>
    <!-- Header -->
    <!-- Start Topbar -->
    <header class="header">
        <div class="topbar bg-theme">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-5">
                        <div class="leftside">
                            <ul class="custom-flex">
                                <li><a href="#" class="text-custom-white"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="text-custom-white"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="text-custom-white"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#" class="text-custom-white"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-7">
                        <div class="rightside full-height">
                            <ul class="custom-flex full-height">
                                <li class="book-appointment">
                                    <a href="{{ route('login') }}"><i class="fa fa-user-alt"></i>Login</a>
                                </li>
                                <li class="book-appointment">
                                    <a href="{{ route('register') }}"><i class="fa fa-key"></i>Register</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="navigation-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <div class="main-navigation">
                                <div class="logo d-flex align-items-center">
                                    <a href="index.html">
                                        <img src="{{ asset('assets/frontend/assets/images/logo.png') }}" class="img-fluid" alt="logo">
                                    </a>
                                </div>
                                <div class="main-menu">
                                    <ul class="custom-flex">
                                        <li class="menu-item active"><a href="index.html">Home</a></li>
                                        <li class="menu-item menu-item-has-children"><a href="#">Inventory</a>
                                            <ul class="submenu custom">
                                                <li class="menu-item"><a href="cars.html">Full Width</a></li>
                                                <li class="menu-item"><a href="cars-left-sidebar.html">Left Sidebar</a>
                                                </li>
                                                <li class="menu-item"><a href="cars-right-sidebar.html">Right
                                                        Sidebar</a></li>
                                                <li class="menu-item"><a href="car-detail.html">Car Detail</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item menu-item-has-children"><a href="#">Blog</a>
                                            <ul class="submenu custom">
                                                <li class="menu-item"><a href="blog.html">Blog Grid</a></li>
                                                <li class="menu-item"><a href="blog-left-sidebar.html">Blog Left</a>
                                                </li>
                                                <li class="menu-item"><a href="blog-right-sidebar.html">Blog right</a>
                                                </li>
                                                <li class="menu-item"><a href="blog-details.html">Blog Detail</a></li>
                                                <li class="menu-item"><a href="blog-details-left-sidebar.html">Blog
                                                        Detail Left</a></li>
                                                <li class="menu-item"><a href="blog-details-right-sidebar.html">Blog
                                                        Detail Right</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item"><a href="about.html">About</a></li>
                                        <li class="menu-item menu-item-has-children"><a href="#">Pages</a>
                                            <ul class="submenu custom">
                                                <li class="menu-item"><a href="booking.html">Booking</a></li>
                                                <li class="menu-item"><a href="faqs.html">Faq</a></li>
                                                <li class="menu-item"><a href="gallery.html">Gallery</a></li>
                                                <li class="menu-item"><a href="404.html">404</a></li>
                                                <li class="menu-item"><a href="coming-soon.html">Coming Soon</a></li>
                                            </ul>
                                        </li>
                                        <li class="menu-item"><a href="contact.html">Contact</a></li>
                                    </ul>
                                </div>
                                <div class="hamburger-menu">
                                    <div class="menu-btn"><span></span><span></span><span></span></div>
                                </div>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End Topbar -->
    <!-- Header -->
    @yield('content')
    <!-- Start Footer -->
    <footer class="section-padding footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="footer-box mb-md-40">
                        <h4 class="text-custom-white fw-600">About Us</h4>
                        <p class="text-custom-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor
                            incididunt.Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                            incididunt.Lorem
                            ipsum dolor sit amet...
                        </p>

                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-box mb-md-40">
                        <h4 class="text-custom-white fw-600">About Us</h4>
                        <ul class="m-0 p-0 main">
                            <li>1-567-124-44227</li>
                            <li>182 main street pert habour 8007</li>
                            <li>Mon-sat 8:00-18:00 Sunday Closed</li>
                        </ul>
                        <ul class="custom-flex socials">
                            <li><a href="#" class="text-custom-white fs-14"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" class="text-custom-white fs-14"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" class="text-custom-white fs-14"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#" class="text-custom-white fs-14"><i class="fab fa-youtube"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="footer-box mb-sm-40">
                        <h4 class="text-custom-white fw-600">Newsletter</h4>
                        <div class="newsletter">
                            <p class="text-custom-white">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod
                                tempor incididunt.</p>
                            <form>
                                <div class="form-group">
                                    <input type="email" name="#" class="form-control form-control-custom"
                                        placeholder="Email I'd">
                                </div>
                                <button type="submit" class="btn-first btn-submits">Subscribe</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <!-- Start Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="text-custom-white">© Rumble - 2020 | All Right Reserved. <a
                            href="http://www.bootstrapmb.com" class="text-custom-white">Designed By codezion</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- End Copyright -->
    <div id="back-top" class="back-top"> <a href="#top"><i class="flaticon-arrows"></i></a> </div>
    <!-- Place all Scripts Here -->
    <!-- jQuery -->
    <script src="{{ asset('assets/frontend/assets/js/jquery.min.js') }}"></script>
    <!-- Popper -->
    <script src="{{ asset('assets/frontend/assets/js/popper.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/frontend/assets/js/bootstrap.min.js') }}"></script>
    <!-- Range Slider -->
    <script src="{{ asset('assets/frontend/assets/js/ion.rangeSlider.min.js') }}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('assets/frontend/assets/js/slick.min.js') }}"></script>
    <!-- Datepicker -->
    <script src="{{ asset('assets/frontend/assets/js/datepicker.js') }}"></script>
    <script src="{{ asset('assets/frontend/assets/js/datepicker.en.js') }}"></script>
    <!-- Isotope Gallery -->
    <script src="{{ asset('assets/frontend/assets/js/isotope.pkgd.min.js') }}"></script>
    <!-- Nice Select -->
    <script src="{{ asset('assets/frontend/assets/js/jquery.nice-select.js') }}"></script>
    <!-- magnific popup -->
    <script src="{{ asset('assets/frontend/assets/js/jquery.magnific-popup.min.js') }}"></script>
    <!-- Maps -->
    <script src="http://www.google.cn/maps/api/js?key=AIzaSyDnd9JwZvXty-1gHZihMoFhJtCXmHfeRQg"></script>
    <!-- Custom Js -->
    <script src="{{ asset('assets/frontend/assets/js/custom.js') }}"></script>
	<!-- /Place all Scripts Here -->
    @stack('scriptplus')
</body>

</html>