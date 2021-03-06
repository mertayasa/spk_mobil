<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">
    <title>Rama Jaya Rental | @yield('title-menu')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Fav and touch icons -->
    {{-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon.ico">
	<link rel="apple-touch-icon-precomposed" href="assets/images/favicon.ico"> --}}
    <link rel="shortcut icon" href="{{ asset('assets/frontend/assets/images/favicon.jpg') }}">
    @yield('style-app')
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
    <link href="{{ asset('vendor/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="{{ asset('assets/frontend/assets/css/style.css') }}" rel="stylesheet">
    <!-- Custom Responsive -->
    <link href="{{ asset('assets/frontend/assets/css/responsive.css') }}" rel="stylesheet">
    @yield('styleplus')
    @yield('js-app')
    <!-- CSS for IE -->
    <!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]><script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>___scripts_1___<![endif]-->
    <!-- place -->
</head>

<body>
    {{-- <div class="loader go"></div> --}}
    <!-- Header -->
    <!-- Start Topbar -->
    <header class="header">
        <div class="topbar bg-theme">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-5">
                        {{-- <div class="leftside">
                            <ul class="custom-flex">
                                <li><a href="#" class="text-custom-white"><i class="fab fa-facebook-f"></i></a></li>
                                <li><a href="#" class="text-custom-white"><i class="fab fa-twitter"></i></a></li>
                                <li><a href="#" class="text-custom-white"><i class="fab fa-instagram"></i></a></li>
                                <li><a href="#" class="text-custom-white"><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div> --}}
                    </div>
                    <div class="col-lg-6 col-md-7">
                        <div class="rightside full-height">
                            <ul class="custom-flex full-height">
                                @guest
                                    <li class="book-appointment">
                                        <a href="{{ route('login') }}"><i class="fa fa-user-alt"></i>Login</a>
                                    </li>
                                    @if (Route::has('register'))
                                        <li class="book-appointment">
                                            <a href="{{ route('register') }}"><i class="fa fa-key"></i>Register</a>
                                        </li>
                                    @endif
                                @else
                                    <li class="book-appointment">
                                        <a href="{{ route('user.profile', Auth::id()) }}" onclick=""><i class="fa fa-user"></i>Profil</a>
                                    </li>
                                    <li class="book-appointment">
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                                class="fa fa-unlock"></i>Log Out</a>
                                        <form action="{{ route('logout') }}" method="post" id="logout-form"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                @endguest
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="nav-wrapper" class="navigation-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav>
                            <div class="main-navigation">
                                <div class="logo d-flex align-items-center">
                                    <a href="#" data-id="#home-slider" class="go-to-id">
                                        <img src="{{ asset('assets/frontend/assets/images/logo.jpeg') }}"
                                            class="img-fluid py-2" alt="logo">
                                        <span>Rama Jaya Rental</span>
                                    </a>
                                </div>
                                <div class="main-menu">
                                    <ul class="custom-flex">
                                        <li class="menu-item active">
                                            <a href="{{ !Request::is('/') ? route('homepage') : '#' }}"
                                                data-id="#home-slider"
                                                class="{{ !Request::is('/') ? '' : 'go-to-id' }}">Home</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ !Request::is('/') ? route('homepage') : '#' }}"
                                                data-id="#search-engine"
                                                class="{{ !Request::is('/') ? '' : 'go-to-id' }}">Mobil</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ !Request::is('/') ? route('homepage') : '#' }}"
                                                data-id="#kriteria-section"
                                                class="{{ !Request::is('/') ? '' : 'go-to-id' }}">Kriteria</a>
                                        </li>
                                        <li class="menu-item">
                                            <a href="{{ !Request::is('/') ? route('homepage') : '#' }}"
                                                data-id="#tentang-section"
                                                class="{{ !Request::is('/') ? '' : 'go-to-id' }}">Tentang Kami</a>
                                        </li>
                                        <li class="menu-item item-no-hover">
                                            <a href="{{ route('cart.index') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M10 19.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5zm3.5-1.5c-.828 0-1.5.671-1.5 1.5s.672 1.5 1.5 1.5 1.5-.671 1.5-1.5c0-.828-.672-1.5-1.5-1.5zm1.336-5l1.977-7h-16.813l2.938 7h11.898zm4.969-10l-3.432 12h-12.597l.839 2h13.239l3.474-12h1.929l.743-2h-4.195z" />
                                                </svg>
                                            </a>
                                        </li>
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
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="footer-box mb-md-40">
                        <h4 class="text-custom-white fw-600">Tentang Kami </h4>
                        <p class="text-custom-white">Perusahaan Rama Jaya Rental merupakan salah satu perusahaan yang bergerak di bidang jasa penyewaan mobil dengan pasar adalah wisatawan domestik maupun mancanegara. Perusahaan ini berdiri pada tahun 2003 yang didirikan oleh Bapak I Wayan Gede Wijaya, S. H. yang berlokasi di Jl. By Pass Prof Dr Ida Bagus Mantra, Ketewel, Gianyar Bali.</p>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="footer-box mb-md-40">
                        <h4 class="text-custom-white fw-600">Kontak Kami</h4>
                        <ul class="m-0 p-0 main">
                            <li><a href="mailto:ramajayarent98@gmail.com" target="_blank">ramajayarent98@gmail.com</a></li>
                            <li><a href="tel:08123964771">08123964771</li>
                        </ul>
                        <ul class="custom-flex socials">
                            {{-- <li><a href="#" class="text-custom-white fs-14"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="#" class="text-custom-white fs-14"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="#" class="text-custom-white fs-14"><i class="fab fa-linkedin"></i></a></li>
                            <li><a href="#" class="text-custom-white fs-14"><i class="fab fa-youtube"></i></a></li> --}}
                        </ul>
                    </div>
                </div>
                {{-- <div class="col-lg-4 col-md-6">
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
                </div> --}}
            </div>
        </div>
    </footer>
    <!-- End Footer -->
    <!-- Start Copyright -->
    {{-- <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <p class="text-custom-white">?? Rumble - 2020 | All Right Reserved. <a
                            href="http://www.bootstrapmb.com" class="text-custom-white">Designed By codezion</a></p>
                </div>
            </div>
        </div>
    </div> --}}
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
    <script src="{{ asset('vendor/sweetalert2/sweetalert2.all.min.js') }}"></script>
    <!-- Maps -->
    {{-- <script src="http://www.google.cn/maps/api/js?key=AIzaSyDnd9JwZvXty-1gHZihMoFhJtCXmHfeRQg"></script> --}}
    <!-- Custom Js -->
    <script src="{{ asset('assets/frontend/assets/js/custom.js') }}"></script>
    <!-- /Place all Scripts Here -->

    <script>
        function showAlert(message, type) {
            Swal.fire({
                icon: type == 'error' ? 'error' : 'success',
                title: message,
                showConfirmButton: false,
                timer: 3000
            })
        }
    </script>

    @stack('scriptplus')
</body>

</html>
