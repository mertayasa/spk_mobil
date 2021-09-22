<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="keywords" content="#">
    <meta name="description" content="#">
    <title>Rumble - Car Rental Booking HTML Template | Homepage</title><!-- Fav and touch icons -->
    {{-- <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/images/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/images/favicon.ico">
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/images/favicon.ico">
	<link rel="apple-touch-icon-precomposed" href="assets/images/favicon.ico"> --}}
    <link rel="shortcut icon" href="{{ asset('assets/frontend/assets/images/favicon.jpg') }}"><!-- Bootstrap -->
    <link href="{{ asset('assets/frontend/assets/css/bootstrap.min.css') }}" rel="stylesheet"><!-- Fontawesome -->
    <link href="{{ asset('assets/frontend/assets/css/font-awesome.css') }}" rel="stylesheet"><!-- Flaticons -->
    <link href="{{ asset('assets/frontend/assets/css/font/flaticon.css') }}" rel="stylesheet"><!-- Slick Slider -->
    <link href="{{ asset('assets/frontend/assets/css/slick.css') }}" rel="stylesheet"><!-- Range Slider -->
    <link href="{{ asset('assets/frontend/assets/css/ion.rangeSlider.min.css') }}" rel="stylesheet"><!-- Datepicker -->
    <link href="{{ asset('assets/frontend/assets/css/datepicker.css') }}" rel="stylesheet"><!-- magnific popup -->
    <link href="{{ asset('assets/frontend/assets/css/magnific-popup.css') }}" rel="stylesheet"><!-- Nice Select -->
    <link href="{{ asset('assets/frontend/assets/css/nice-select.css') }}" rel="stylesheet"><!-- Custom Stylesheet -->
    <link href="{{ asset('assets/frontend/assets/css/style.cs') }}s" rel="stylesheet"><!-- Custom Responsive -->
    <link href="{{ asset('assets/frontend/assets/css/responsive.css') }}" rel="stylesheet"><!-- CSS for IE -->
    <!--[if lte IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]><script type='text/javascript' src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><script type='text/javascript' src="http://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js"></script><![endif]-->
    <!-- place -->
</head>

<body>
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
                                <li class="book-appointment"><a href="booking.html">Booking Now </a></li>
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
    </header><!-- End Topbar -->
    <!-- Header -->
    <!-- Start Slider -->
    <div class="slider p-relative">
        <div class="main-banner arrow-layout-1 ">
            <div class="slide-item">
                <img src="{{ asset('assets/frontend/assets/images/car-1.jpg') }}" class="image-fit" alt="Slider">
                <div class="transform-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="slider-content">
                                    <h1 class="text-custom-white">Upto 25% off on first booking <span class="text-custom-blue">Car</span>through your app!</h1>
                                    <ul class="custom">
                                        <li class="text-custom-white"><i class="fas fa-dollar-sign"></i>Best Price Guaranteed </li>
                                        <li class="text-custom-white"><i class="fas fa-car"></i>Home Pickups </li>
                                        <li class="text-custom-white"><i class="fas fa-laptop"></i>Easy Bookings </li>
                                        <li class="text-custom-white"><i class="fas fa-headphones-alt"></i>24/7 Customer Care </li>
                                    </ul>
									<a href="#" data-id="#search-engine" class="btn-first btn-small go-id">Find Out More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item">
                <img src="{{ asset('assets/frontend/assets/images/car-1.jpg') }}" class="image-fit" alt="Slider">
                <div class="transform-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="slider-content">
                                    <h1 class="text-custom-white">Upto 25% off on first booking <span class="text-custom-blue">Car</span>through your app!</h1>
                                    <ul class="custom">
                                        <li class="text-custom-white"><i class="fas fa-dollar-sign"></i>Best Price Guaranteed </li>
                                        <li class="text-custom-white"><i class="fas fa-car"></i>Home Pickups </li>
                                        <li class="text-custom-white"><i class="fas fa-laptop"></i>Easy Bookings </li>
                                        <li class="text-custom-white"><i class="fas fa-headphones-alt"></i>24/7 Customer Care </li>
                                    </ul>
									<a href="#" data-id="#search-engine" class="btn-first btn-small go-id">Find Out More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="slide-item">
                <img src="{{ asset('assets/frontend/assets/images/car-1.jpg') }}" class="image-fit" alt="Slider">
                <div class="transform-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="slider-content">
                                    <h1 class="text-custom-white">Book your <span class="text-custom-blue">Car</span>through your app!</h1>
                                    <p class="text-custom-white">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                                    <a href="#" data-id="#search-engine" class="btn-first btn-small go-id">Find Out More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider -->
    <!-- Start Banner tabs -->
    <div id="search-engine">
		<div class="banner-tabs">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="tabs">
							<div class="tab-content">
								<div class="tab-pane active" id="cars">
									<div class="tab-inner">
										<form>
											<div class="row">
												<div class="col-lg-3 col-md-6">
													<div class="form-group">
														<label class="fs-14 text-custom-white fw-600">Category Cars</label>
														<div class="group-form">
															<select class="custom-select form-control form-control-custom">
																<option>Category 1</option>
																<option>Category 2</option>
																<option>Category 3</option>
															</select>
														</div>
													</div>
												</div>
												<div class="col-lg-5 col-md-6">
													<div class="form-group">
														<label class="fs-14 text-custom-white fw-600">Name Cars</label>
														<input type="text" name="#" class="form-control form-control-custom"
															placeholder="Search Cars by Name">
													</div>
												</div>
												<div class="col-lg-4 col-md-12">
													<div class="row">
														<div class="col-4">
															<div class="form-group">
																<label class="fs-14 text-custom-white fw-600">Passenger</label>
																<div class="group-form">
																	<select
																		class="custom-select form-control form-control-custom">
																		<option>1</option>
																		<option>2</option>
																		<option>3</option>
																		<option>4</option>
																		<option>5</option>
																		<option>6</option>
																	</select>
																</div>
															</div>
														</div>
														<div class="col-8">
															<div class="form-group">
																<label class="submit"></label>
																<button class="btn-first btn-submit full-width btn-height">Search</button>
															</div>
														</div>
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
			</div>
		</div>
    </div>
    <!-- End Banner tabs -->
	<!-- Start Blog -->
	<section class="section-padding bg-light-white">
		<div class="container">
		  <div class="row">
			<div class="col-12">
			  <div class="listing-top-heading mb-xl-20">
				<h6 class="no-margin text-custom-black">Showing 8 Results</h6>
				<div class="sort-by"><span class="text-custom-black fs-14 fw-600">Sort by</span>
				  <div class="group-form"><select class="form-control form-control-custom custom-select">
					  <option>A to Z</option>
					  <option>Z to A</option>
					</select></div>
				</div>
			  </div>
			</div>
			<div class=" col-lg-4 col-md-6">
			  <div class="car-grid mb-xl-30">
				<div class="car-grid-wrapper car-grid bx-wrapper">
				  <div class="image-sec animate-img"><a href="#"><img src="{{ asset('assets/frontend/assets/images/cars/1.png') }}" class="full-width"
						alt="img"></a></div>
				  <div class="car-grid-caption padding-20 bg-custom-white p-relative">
					<h4 class="title fs-16">
						<a href="#" class="text-custom-black">
							Economy<small class="text-light-dark">Per Day</small>
						</a>
					</h4>
					<span class="price"><small>From</small>$18</span>
					<p>Grate explorer of tha truth tha master-bulder of human happines.</p>
					<div class="action"><a class="btn-second btn-small" href="#">View</a><a class="btn-first btn-submit"
						href="#">Book</a></div>
				  </div>
				</div>
			  </div>
			</div>
			<div class=" col-lg-4 col-md-6">
			  <div class="car-grid mb-xl-30">
				<div class="car-grid-wrapper car-grid bx-wrapper">
				  <div class="image-sec animate-img"><a href="#"><img src="{{ asset('assets/frontend/assets/images/cars/2.png') }}" class="full-width"
						alt="img"></a></div>
				  <div class="car-grid-caption padding-20 bg-custom-white p-relative">
					<h4 class="title fs-16">
						<a href="#" class="text-custom-black">
							Delux<small class="text-light-dark">2 Day</small>
						</a>
					</h4>
					<span class="price"><small>From</small>$58</span>
					<p>Grate explorer of tha truth tha master-bulder of human happines.</p>
					<div class="action"><a class="btn-second btn-small" href="#">View</a><a class="btn-first btn-submit"
						href="#">Book</a></div>
				  </div>
				</div>
			  </div>
			</div>
			<div class=" col-lg-4 col-md-6">
			  <div class="car-grid mb-xl-30">
				<div class="car-grid-wrapper car-grid bx-wrapper">
				  <div class="image-sec animate-img"><a href="#"><img src="{{ asset('assets/frontend/assets/images/cars/3.png') }}" class="full-width"
						alt="img"></a></div>
				  <div class="car-grid-caption padding-20 bg-custom-white p-relative">
					<h4 class="title fs-16"><a href="#" class="text-custom-black">Special offer<small
						  class="text-light-dark">Per Day</small></a></h4><span class="price"><small>From</small>$28</span>
					<p>Grate explorer of tha truth tha master-bulder of human happines.</p>
					<div class="action"><a class="btn-second btn-small" href="#">View</a><a class="btn-first btn-submit"
						href="#">Book</a></div>
				  </div>
				</div>
			  </div>
			</div>
			<div class=" col-lg-4 col-md-6">
			  <div class="car-grid mb-xl-30">
				<div class="car-grid-wrapper car-grid bx-wrapper">
				  <div class="image-sec animate-img"><a href="#"><img src="{{ asset('assets/frontend/assets/images/cars/4.png') }}" class="full-width"
						alt="img"></a></div>
				  <div class="car-grid-caption padding-20 bg-custom-white p-relative">
					<h4 class="title fs-16"><a href="#" class="text-custom-black">Economy<small class="text-light-dark">Per
						  Day</small></a></h4><span class="price"><small>From</small>$58</span>
					<p>Grate explorer of tha truth tha master-bulder of human happines.</p>
					<div class="action"><a class="btn-second btn-small" href="#">View</a><a class="btn-first btn-submit"
						href="#">Book</a></div>
				  </div>
				</div>
			  </div>
			</div>
			<div class="col-lg-4 col-md-6">
			  <div class="car-grid mb-xl-30">
				<div class="car-grid-wrapper car-grid bx-wrapper">
				  <div class="image-sec animate-img"><a href="#"><img src="{{ asset('assets/frontend/assets/images/cars/5.png') }}" class="full-width"
						alt="img"></a></div>
				  <div class="car-grid-caption padding-20 bg-custom-white p-relative">
					<h4 class="title fs-16"><a href="#" class="text-custom-black">Platinum<small class="text-light-dark">Per
						  Day</small></a></h4><span class="price"><small>From</small>$58</span>
					<p>Grate explorer of tha truth tha master-bulder of human happines.</p>
					<div class="action"><a class="btn-second btn-small" href="#">View</a><a class="btn-first btn-submit"
						href="#">Book</a></div>
				  </div>
				</div>
			  </div>
			</div>
			<div class="col-lg-4 col-md-6">
			  <div class="car-grid mb-xl-30">
				<div class="car-grid-wrapper car-grid bx-wrapper">
				  <div class="image-sec animate-img"><a href="#"><img src="{{ asset('assets/frontend/assets/images/cars/6.png') }}" class="full-width"
						alt="img"></a></div>
				  <div class="car-grid-caption padding-20 bg-custom-white p-relative">
					<h4 class="title fs-16"><a href="#" class="text-custom-black">Super Gold<small
						  class="text-light-dark">Per Day</small></a></h4><span class="price"><small>From</small>$158</span>
					<p>Grate explorer of tha truth tha master-bulder of human happines.</p>
					<div class="action"><a class="btn-second btn-small" href="#">View</a><a class="btn-first btn-submit"
						href="#">Book</a></div>
				  </div>
				</div>
			  </div>
			</div>
			<div class="col-lg-4 col-md-6">
			  <div class="car-grid mb-xl-30">
				<div class="car-grid-wrapper car-grid bx-wrapper">
				  <div class="image-sec animate-img"><a href="#"><img src="{{ asset('assets/frontend/assets/images/cars/7.png') }}" class="full-width"
						alt="img"></a></div>
				  <div class="car-grid-caption padding-20 bg-custom-white p-relative">
					<h4 class="title fs-16"><a href="#" class="text-custom-black">Economy<small class="text-light-dark">Per
						  Day</small></a></h4><span class="price"><small>From</small>$58</span>
					<p>Grate explorer of tha truth tha master-bulder of human happines.</p>
					<div class="action"><a class="btn-second btn-small" href="#">View</a><a class="btn-first btn-submit"
						href="#">Book</a></div>
				  </div>
				</div>
			  </div>
			</div>
			<div class="col-lg-4 col-md-6">
			  <div class="car-grid mb-xl-30">
				<div class="car-grid-wrapper car-grid bx-wrapper">
				  <div class="image-sec animate-img"><a href="#"><img src="{{ asset('assets/frontend/assets/images/cars/8.png') }}" class="full-width"
						alt="img"></a></div>
				  <div class="car-grid-caption padding-20 bg-custom-white p-relative">
					<h4 class="title fs-16"><a href="#" class="text-custom-black">Duplex<small class="text-light-dark">Per
						  Day</small></a></h4><span class="price"><small>From</small>$58</span>
					<p>Grate explorer of tha truth tha master-bulder of human happines.</p>
					<div class="action"><a class="btn-second btn-small" href="#">View</a><a class="btn-first btn-submit"
						href="#">Book</a></div>
				  </div>
				</div>
			  </div>
			</div>
			<div class="col-lg-4 col-md-6">
			  <div class="car-grid mb-md-30">
				<div class="car-grid-wrapper car-grid bx-wrapper">
				  <div class="image-sec animate-img"><a href="#"><img src="{{ asset('assets/frontend/assets/images/cars/9.png') }}" class="full-width"
						alt="img"></a></div>
				  <div class="car-grid-caption padding-20 bg-custom-white p-relative">
					<h4 class="title fs-16"><a href="#" class="text-custom-black">Economy<small class="text-light-dark">Per
						  Day</small></a></h4><span class="price"><small>From</small>$58</span>
					<p>Grate explorer of tha truth tha master-bulder of human happines.</p>
					<div class="action"><a class="btn-second btn-small" href="#">View</a><a class="btn-first btn-submit"
						href="#">Book</a></div>
				  </div>
				</div>
			  </div>
			</div>
			<div class="col-lg-4 col-md-6">
			  <div class="car-grid mb-xl-30">
				<div class="car-grid-wrapper car-grid bx-wrapper">
				  <div class="image-sec animate-img"><a href="#"><img src="{{ asset('assets/frontend/assets/images/cars/10.png') }}" class="full-width"
						alt="img"></a></div>
				  <div class="car-grid-caption padding-20 bg-custom-white p-relative">
					<h4 class="title fs-16"><a href="#" class="text-custom-black">Gold<small class="text-light-dark">Per
						  Day</small></a></h4><span class="price"><small>From</small>$58</span>
					<p>Grate explorer of tha truth tha master-bulder of human happines.</p>
					<div class="action"><a class="btn-second btn-small" href="#">View</a><a class="btn-first btn-submit"
						href="#">Book</a></div>
				  </div>
				</div>
			  </div>
			</div>
			<div class="col-lg-4 col-md-6">
			  <div class="car-grid mb-xl-30">
				<div class="car-grid-wrapper car-grid bx-wrapper">
				  <div class="image-sec animate-img"><a href="#"><img src="{{ asset('assets/frontend/assets/images/cars/11.png') }}" class="full-width"
						alt="img"></a></div>
				  <div class="car-grid-caption padding-20 bg-custom-white p-relative">
					<h4 class="title fs-16"><a href="#" class="text-custom-black">Platinum<small class="text-light-dark">Per
						  Day</small></a></h4><span class="price"><small>From</small>$58</span>
					<p>Grate explorer of tha truth tha master-bulder of human happines.</p>
					<div class="action"><a class="btn-second btn-small" href="#">View</a><a class="btn-first btn-submit"
						href="#">Book</a></div>
				  </div>
				</div>
			  </div>
			</div>
			<div class="col-lg-4 col-md-6">
			  <div class="car-grid mb-xl-30">
				<div class="car-grid-wrapper car-grid bx-wrapper">
				  <div class="image-sec animate-img"><a href="#"><img src="{{ asset('assets/frontend/assets/images/cars/12.png') }}" class="full-width"
						alt="img"></a></div>
				  <div class="car-grid-caption padding-20 bg-custom-white p-relative">
					<h4 class="title fs-16"><a href="#" class="text-custom-black">Duplex<small class="text-light-dark">2
						  Day</small></a></h4><span class="price"><small>From</small>$18</span>
					<p>Grate explorer of tha truth tha master-bulder of human happines.</p>
					<div class="action"><a class="btn-second btn-small" href="#">View</a><a class="btn-first btn-submit"
						href="#">Book</a></div>
				  </div>
				</div>
			  </div>
			</div>
		  </div>
		  <div class="row">
			<div class="col-12">
			  <nav>
				<ul class="pagination justify-content-center">
				  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
				  <li class="page-item"><a class="page-link" href="#">1</a></li>
				  <li class="page-item active"><a class="page-link" href="#">2</a></li>
				  <li class="page-item"><a class="page-link" href="#">3</a></li>
				  <li class="page-item"><a class="page-link" href="#">Next</a></li>
				</ul>
			  </nav>
			</div>
		  </div>
		</div>
	</section>
	<!-- End Blog -->
    <!-- Start About Us -->
    <section class="section-padding about-us">
        <div class="container">
            <div class="row">
                <div class="col-xl-7 col-lg-6 pl-2 pr-2 align-self-center text-left">
                    <div class="about-left-side mb-md-80">
                        <div class="section-header style-left">
                            <div class="section-heading">
                                <h3>Subaru <span class="text-custom-blue">Impreza</span></h3>
                                <div class="section-description">
                                    <div class="car-price"> <strong>$125</strong> <span>/Day</span> </div>
                                </div>
                            </div>
                        </div>
                        <p class="pt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text. Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                        <p class="pt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                        <p class="pt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text. Lorem Ipsum has been the industry's standard dummy text. Lorem Ipsum is simply dummy.</p>
						<a href="about.html" class="btn-first btn-submit">Reserve Now</a>
                    </div>
                </div>
                <div class="col-xl-5 col-lg-6">
                    <div class="about-right-side full-height">
                        <div class="about-img full-height"><img
                                src="{{ asset('assets/frontend/assets/images/about.jpg') }}" class="img-fluid image-fit"
                                alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
	<!-- End About Us -->
    <!-- Start Our work -->
    <section class="section-padding our-work-sec bg-light-white">
        <div class="container">
            <div class="section-header text-center">
                <div class="section-heading">
                    <h3 class="text-custom-black">Our <span class="text-custom-blue">Work</span></h3>
                    <div class="section-description">
                        <p class="text-light-dark">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="work-sec animate-img"> <a href="#"> <img
                                        src="{{ asset('assets/frontend/assets/images/tour-block_2.jpg') }}"
                                        class="image-fit" alt="img">
                                    <div class="text-wrapper">
                                        <h4 class="text-custom-white no-margin fw-600">Luxes</h4>
                                        <p class="text-custom-white no-margin">1100 Locations</p>
                                    </div>
                                </a> </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="work-sec animate-img"> <a href="#"> <img
                                        src="{{ asset('assets/frontend/assets/images/tour-block_3.jpg') }}"
                                        class="image-fit" alt="img">
                                    <div class="text-wrapper">
                                        <h4 class="text-custom-white no-margin fw-600">MINI</h4>
                                        <p class="text-custom-white no-margin">1250 Locations</p>
                                    </div>
                                </a> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="work-sec animate-img"> <a href="#"> <img
                                        src="{{ asset('assets/frontend/assets/images/tour-block_1.jpg') }}"
                                        class="image-fit" alt="img">
                                    <div class="text-wrapper">
                                        <h4 class="text-custom-white no-margin fw-600">Porsche</h4>
                                        <p class="text-custom-white no-margin">1550 Locations</p>
                                    </div>
                                </a> </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="work-sec animate-img first-box"> <a href="#"> <img
                                src="{{ asset('assets/frontend/assets/images/tour-block_4.jpg') }}" class="image-fit"
                                alt="img">
                            <div class="text-wrapper">
                                <h4 class="text-custom-white no-margin fw-600">Mercedes Benz</h4>
                                <p class="text-custom-white no-margin">1150 Offers</p>
                            </div>
                        </a> </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our work -->
    <!-- Start gallery -->
    <section class="section-padding gallery">
        <div class="container">
            <div class="section-header text-center">
                <div class="section-heading">
                    <h3 class="text-custom-black">Our <span class="text-custom-blue">Gallery</span></h3>
                    <div class="section-description">
                        <p class="text-light-dark">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tabs filter-gallery">
                        <ul class="custom-flex nav nav-tabs mb-xl-40">
                            <li class="nav-item"><a class="nav-link active" href="#" data-filter="*">Show All</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" data-filter=".tab-gallery">Brakes</a></li>
                            <li class="nav-item"><a class="nav-link" href="#"
                                    data-filter=".tab-gallery-1">Suspension</a></li>
                            <li class="nav-item"><a class="nav-link" href="#" data-filter=".tab-gallery-2">Wheels</a>
                            </li>
                            <li class="nav-item"><a class="nav-link" href="#" data-filter=".car-gallery">Steering</a>
                            </li>
                        </ul>
                    </div>
                    <div class="row gallery-grid">
                        <div class="col-lg-4 col-md-6 filter-box tab-gallery">
                            <div class="gallery-item mb-xl-30">
								<a href="{{ asset('assets/frontend/assets/images/gallery/g_gal_1.jpg') }}" class="popup">
									<img src="{{ asset('assets/frontend/assets/images/gallery/g_gal_1.jpg') }}" class="image-fit" alt="img">
								</a>
							</div>
                        </div>
                        <div class="col-lg-4 col-md-6 filter-box tab-gallery-1">
                            <div class="gallery-item mb-xl-30">
								<a href="{{ asset('assets/frontend/assets/images/gallery/g_gal_2.jpg') }}" class="popup">
									<img src="{{ asset('assets/frontend/assets/images/gallery/g_gal_2.jpg') }}" class="image-fit" alt="img">
								</a>
							</div>
                        </div>
                        <div class="col-lg-4 col-md-6 filter-box tab-gallery-2">
                            <div class="gallery-item mb-xl-30">
								<a href="{{ asset('assets/frontend/assets/images/gallery/g_gal_3.jpg') }}" class="popup">
									<img src="{{ asset('assets/frontend/assets/images/gallery/g_gal_3.jpg') }}" class="image-fit" alt="img">
								</a>
							</div>
                        </div>
                        <div class="col-lg-4 col-md-6 filter-box car-gallery">
                            <div class="gallery-item mb-xl-30">
								<a href="{{ asset('assets/frontend/assets/images/gallery/g_gal_4.jpg') }}" class="popup">
									<img src="{{ asset('assets/frontend/assets/images/gallery/g_gal_4.jpg') }}" class="image-fit" alt="img">
								</a>
							</div>
                        </div>
                        <div class="col-lg-4 col-md-6 filter-box tab-gallery">
                            <div class="gallery-item mb-xl-30">
								<a href="{{ asset('assets/frontend/assets/images/gallery/g_gal_5.jpg') }}" class="popup">
									<img src="{{ asset('assets/frontend/assets/images/gallery/g_gal_5.jpg') }}" class="image-fit" alt="img">
								</a>
							</div>
                        </div>
                        <div class="col-lg-4 col-md-6 filter-box tab-gallery-1">
                            <div class="gallery-item mb-xl-30">
								<a href="{{ asset('assets/frontend/assets/images/gallery/g_gal_6.jpg') }}" class="popup">
									<img src="{{ asset('assets/frontend/assets/images/gallery/g_gal_6.jpg') }}" class="image-fit" alt="img">
								</a>
							</div>
                        </div>
                        <div class="col-lg-4 col-md-6 filter-box tab-gallery-2">
                            <div class="gallery-item mb-xl-30">
								<a href="{{ asset('assets/frontend/assets/images/gallery/g_gal_7.jpg') }}" class="popup">
									<img src="{{ asset('assets/frontend/assets/images/gallery/g_gal_7.jpg') }}" class="image-fit" alt="img">
								</a>
							</div>
                        </div>
                        <div class="col-lg-4 col-md-6 filter-box car-gallery">
                            <div class="gallery-item mb-xl-30">
								<a href="{{ asset('assets/frontend/assets/images/gallery/g_gal_8.jpg') }}" class="popup">
									<img src="{{ asset('assets/frontend/assets/images/gallery/g_gal_8.jpg') }}" class="image-fit" alt="img">
								</a>
							</div>
                        </div>
                        <div class="col-lg-4 col-md-6 filter-box tab-gallery">
                            <div class="gallery-item mb-xl-30">
								<a href="{{ asset('assets/frontend/assets/images/gallery/g_gal_9.jpg') }}" class="popup">
									<img src="{{ asset('assets/frontend/assets/images/gallery/g_gal_9.jpg') }}" class="image-fit" alt="img">
								</a>
							</div>
                        </div>
                        <div class="col-lg-4 col-md-6 filter-box tab-gallery-1">
                            <div class="gallery-item mb-xl-30">
								<a href="{{ asset('assets/frontend/assets/images/gallery/g_gal_10.jpg') }}" class="popup">
									<img src="{{ asset('assets/frontend/assets/images/gallery/g_gal_10.jpg') }}" class="image-fit" alt="img">
								</a>
							</div>
                        </div>
                        <div class="col-lg-4 col-md-6 filter-box tab-gallery-2">
                            <div class="gallery-item mb-xl-30">
								<a href="{{ asset('assets/frontend/assets/images/gallery/g_gal_11.jpg') }}" class="popup">
									<img src="{{ asset('assets/frontend/assets/images/gallery/g_gal_11.jpg') }}" class="image-fit" alt="img">
								</a>
							</div>
                        </div>
                        <div class="col-lg-4 col-md-6 filter-box car-gallery">
                            <div class="gallery-item mb-xl-30">
								<a href="{{ asset('assets/frontend/assets/images/gallery/g_gal_12.jpg') }}" class="popup">
									<img src="{{ asset('assets/frontend/assets/images/gallery/g_gal_12.jpg') }}" class="image-fit" alt="img">
								</a>
							</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End gallery -->
    <!-- Start Our Services -->
    <section class="section-padding service-symptoms parallax  bg-light-white">
        <div class="overlay overlay-bg-theme"></div>
        <div class="container">
            <div class="section-header text-center">
                <div class="section-heading">
                    <h3 class="text-custom-black">Our <span class="text-custom-blue">Services</span></h3>
                    <div class="section-description">
                        <p class="text-light-dark">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="service-sy-grid mb-xl-30">
                        <div class="img-wrap"> <img
                                src="{{ asset('assets/frontend/assets/images/services/services-1.jpg') }}"
                                class="image-fit" alt="img"> </div>
                        <div class="caption">
                            <h5 class="no-margin fw-600"><a href="#" class="text-custom-black">TIRE AND WHEEL</a></h5>
                        </div>
                        <div class="hover-wrap">
                            <div class="text-wrap">
                                <h5 class="fw-600"><a href="#" class="text-custom-black">TIRE, WHEEL SERVICES</a></h5>
                                <p class="text-light-white mb-xl-20">Lorem Ipsum is simply dummy text of the printing
                                    and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text.</p><a href="#"
                                    class="btn-second btn-small">See All</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-sy-grid mb-xl-30">
                        <div class="img-wrap"><img
                                src="{{ asset('assets/frontend/assets/images/services/services-7.jpg') }}"
                                class="image-fit" alt="img"></div>
                        <div class="caption">
                            <h5 class="no-margin fw-600"><a href="#" class="text-custom-black">BRAKE REPAIR</a></h5>
                        </div>
                        <div class="hover-wrap">
                            <div class="text-wrap">
                                <h5 class="fw-600"><a href="#" class="text-custom-black">BRAKE REPAIR</a></h5>
                                <p class="text-light-white mb-xl-20">Lorem Ipsum is simply dummy text of the printing
                                    and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                                <a href="#" class="btn-second btn-small">See All</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-sy-grid mb-xl-30">
                        <div class="img-wrap"> <img
                                src="{{ asset('assets/frontend/assets/images/services/services-8.jpg') }}"
                                class="image-fit" alt="img"> </div>
                        <div class="caption">
                            <h5 class="no-margin fw-600"><a href="#" class="text-custom-black">LUBE, OIL AND FILTERS</a>
                            </h5>
                        </div>
                        <div class="hover-wrap">
                            <div class="text-wrap">
                                <h5 class="fw-600"><a href="#" class="text-custom-black">LUBE, OIL AND FILTERS</a></h5>
                                <p class="text-light-white mb-xl-20">Lorem Ipsum is simply dummy text of the printing
                                    and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text.</p><a href="#"
                                    class="btn-second btn-small">See All</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="service-sy-grid mb-md-30">
                        <div class="img-wrap"><img
                                src="{{ asset('assets/frontend/assets/images/services/services-9.jpg') }}"
                                class="image-fit" alt="img"></div>
                        <div class="caption">
                            <h5 class="no-margin fw-600"><a href="#" class="text-custom-black">ENGINE DIAGNOSTICS</a>
                            </h5>
                        </div>
                        <div class="hover-wrap">
                            <div class="text-wrap">
                                <h5 class="fw-600"><a href="#" class="text-custom-black">ENGINE DIAGNOSTICS</a></h5>
                                <p class="text-light-white mb-xl-20">Lorem Ipsum is simply dummy text of the printing
                                    and typesetting
                                    industry. Lorem Ipsum has been the industry's standard dummy text.</p>
                                <a href="#" class="btn-second btn-small">See All</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Our Service -->

    <!-- Recommended Cars -->
    <section class="section-padding car-booking">
        <div class="container">
            <div class="section-header text-center">
                <div class="section-heading">
                    <h3 class="text-custom-black">Recommended <span class="text-custom-blue">Cars</span></h3>
                    <div class="section-description">
                        <p class="text-light-dark">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="car-slider arrow-layout-2 row">
                        <div class="slide-item col-12">
                            <div class="car-grid">
                                <div class="car-grid-wrapper car-grid bx-wrapper">
                                    <div class="image-sec animate-img"><a href="car-detail.html"><img
                                                src="{{ asset('assets/frontend/assets/images/cars/1.png') }}"
                                                class="full-width" alt="img"></a></div>
                                    <div class="car-grid-caption padding-20 bg-custom-white p-relative">
                                        <h4 class="title fs-16"><a href="car-detail.html"
                                                class="text-custom-black">Economy<small class="text-light-dark">Per
                                                    day</small></a></h4><span
                                            class="price"><small>From</small>$20</span>
                                        <p>Grate explorer of tha truth tha master-bulder of human happines.</p>
                                        <div class="action"><a class="btn-second btn-small"
                                                href="car-detail.html">View</a><a class="btn-first btn-submit yellow"
                                                href="booking.html">Book</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item col-12">
                            <div class="car-grid">
                                <div class="car-grid-wrapper car-grid bx-wrapper">
                                    <div class="image-sec animate-img"><a href="car-detail.html"><img
                                                src="{{ asset('assets/frontend/assets/images/cars/2.png') }}"
                                                class="full-width" alt="img"></a></div>
                                    <div class="car-grid-caption padding-20 bg-custom-white p-relative">
                                        <h4 class="title fs-16"><a href="car-detail.html"
                                                class="text-custom-black">Deluxe<small class="text-light-dark">Per
                                                    day</small></a></h4><span
                                            class="price"><small>From</small>$35</span>
                                        <p>Grate explorer of tha truth tha master-bulder of human happines.</p>
                                        <div class="action"><a class="btn-second btn-small"
                                                href="car-detail.html">View</a><a class="btn-first btn-submit yellow"
                                                href="booking.html">Book</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item col-12">
                            <div class="car-grid">
                                <div class="car-grid-wrapper car-grid bx-wrapper">
                                    <div class="image-sec animate-img"><a href="car-detail.html"><img
                                                src="{{ asset('assets/frontend/assets/images/cars/3.png') }}"
                                                class="full-width" alt="img"></a></div>
                                    <div class="car-grid-caption padding-20 bg-custom-white p-relative">
                                        <h4 class="title fs-16"><a href="car-detail.html"
                                                class="text-custom-black">Patinum<small class="text-light-dark">Per
                                                    day</small></a></h4><span
                                            class="price"><small>From</small>$50</span>
                                        <p>Grate explorer of tha truth tha master-bulder of human happines.</p>
                                        <div class="action"><a class="btn-second btn-small"
                                                href="car-detail.html">View</a><a class="btn-first btn-submit yellow"
                                                href="booking.html">Book</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item col-12">
                            <div class="car-grid">
                                <div class="car-grid-wrapper car-grid bx-wrapper">
                                    <div class="image-sec animate-img"><a href="car-detail.html"><img
                                                src="{{ asset('assets/frontend/assets/images/cars/4.png') }}"
                                                class="full-width" alt="img"></a></div>
                                    <div class="car-grid-caption padding-20 bg-custom-white p-relative">
                                        <h4 class="title fs-16"><a href="car-detail.html"
                                                class="text-custom-black">Delux<small class="text-light-dark">Per
                                                    day</small></a></h4><span
                                            class="price"><small>From</small>$68</span>
                                        <p>Grate explorer of tha truth tha master-bulder of human happines.</p>
                                        <div class="action"><a class="btn-second btn-small"
                                                href="car-detail.html">View</a><a class="btn-first btn-submit yellow"
                                                href="booking.html">Book</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item col-12">
                            <div class="car-grid">
                                <div class="car-grid-wrapper car-grid bx-wrapper">
                                    <div class="image-sec animate-img"><a href="car-detail.html"><img
                                                src="{{ asset('assets/frontend/assets/images/cars/5.png') }}"
                                                class="full-width" alt="img"></a></div>
                                    <div class="car-grid-caption padding-20 bg-custom-white p-relative">
                                        <h4 class="title fs-16"><a href="car-detail.html"
                                                class="text-custom-black">Economy<small class="text-light-dark">Per
                                                    day</small></a></h4><span
                                            class="price"><small>From</small>$58</span>
                                        <p>Grate explorer of tha truth tha master-bulder of human happines.</p>
                                        <div class="action"><a class="btn-second btn-small"
                                                href="car-detail.html">View</a><a class="btn-first btn-submit yellow"
                                                href="booking.html">Book</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Car -->
    <!-- Start Our Team -->
    <section class="section-padding parallax our-team">
        <div class="overlay overlay-bg-black"></div>
        <div class="container">
            <div class="section-header text-center">
                <div class="section-heading">
                    <h3 class="text-custom-white">Our <span class="text-custom-blue">Team</span></h3>
                    <div class="section-description">
                        <p class="text-custom-white">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry.
                            Lorem Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="team-slider arrow-layout-2 row">
                        <div class="slide-item col-12">
                            <div class="team-sy-grid">
                                <div class="img-wrap"> <img
                                        src="{{ asset('assets/frontend/assets/images/agent-1.jpg') }}" class="image-fit"
                                        alt="img"> </div>
                                <div class="caption">
                                    <h5 class="no-margin fw-600"><a href="#" class="text-custom-black">Vanessa Simpson
                                        </a></h5>
                                </div>
                                <div class="hover-wrap">
                                    <div class="text-wrap">
                                        <h5 class="fw-600"><a href="#" class="text-custom-black">Vanessa Simpson </a>
                                        </h5>
                                        <p class="text-light-white mb-xl-20">Lorem Ipsum is simply dummy text of the
                                            printing and
                                            typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                            text.</p><a href="#" class="btn-second btn-small">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item col-12">
                            <div class="team-sy-grid mb-md-30">
                                <div class="img-wrap"><img
                                        src="{{ asset('assets/frontend/assets/images/agent-2.jpg') }}" class="image-fit"
                                        alt="img"></div>
                                <div class="caption">
                                    <h5 class="no-margin fw-600"><a href="#" class="text-custom-black">Rebecca Smith</a>
                                    </h5>
                                </div>
                                <div class="hover-wrap">
                                    <div class="text-wrap">
                                        <h5 class="fw-600"><a href="#" class="text-custom-black">Rebecca Smith</a></h5>
                                        <p class="text-light-white mb-xl-20">Lorem Ipsum is simply dummy text of the
                                            printing and
                                            typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                            text.</p>
                                        <a href="#" class="btn-second btn-small">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item col-12">
                            <div class="team-sy-grid mb-md-30">
                                <div class="img-wrap"> <img
                                        src="{{ asset('assets/frontend/assets/images/agent-3.jpg') }}" class="image-fit"
                                        alt="img"> </div>
                                <div class="caption">
                                    <h5 class="no-margin fw-600"><a href="#" class="text-custom-black">Aaron Green</a>
                                    </h5>
                                </div>
                                <div class="hover-wrap">
                                    <div class="text-wrap">
                                        <h5 class="fw-600"><a href="#" class="text-custom-black">Aaron Green</a></h5>
                                        <p class="text-light-white mb-xl-20">Lorem Ipsum is simply dummy text of the
                                            printing and
                                            typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                            text.</p><a href="#" class="btn-second btn-small">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item col-12">
                            <div class="team-sy-grid mb-xl-30">
                                <div class="img-wrap"><img
                                        src="{{ asset('assets/frontend/assets/images/agent-4.jpg') }}" class="image-fit"
                                        alt="img"></div>
                                <div class="caption">
                                    <h5 class="no-margin fw-600"><a href="#" class="text-custom-black">James Aderson</a>
                                    </h5>
                                </div>
                                <div class="hover-wrap">
                                    <div class="text-wrap">
                                        <h5 class="fw-600"><a href="#" class="text-custom-black">James Aderson</a></h5>
                                        <p class="text-light-white mb-xl-20">Lorem Ipsum is simply dummy text of the
                                            printing and
                                            typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                            text.</p>
                                        <a href="#" class="btn-second btn-small">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slide-item col-12">
                            <div class="team-sy-grid mb-xl-30">
                                <div class="img-wrap"> <img
                                        src="{{ asset('assets/frontend/assets/images/agent-4.jpg') }}" class="image-fit"
                                        alt="img"> </div>
                                <div class="caption">
                                    <h5 class="no-margin fw-600"><a href="#" class="text-custom-black">Elizabeth</a>
                                    </h5>
                                </div>
                                <div class="hover-wrap">
                                    <div class="text-wrap">
                                        <h5 class="fw-600"><a href="#" class="text-custom-black">Elizabeth</a></h5>
                                        <p class="text-light-white mb-xl-20">Lorem Ipsum is simply dummy text of the
                                            printing and
                                            typesetting industry. Lorem Ipsum has been the industry's standard dummy
                                            text.</p><a href="#" class="btn-second btn-small">Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Our Team -->
    <!-- Start Why choose Us -->
    <section class="section-padding why-choose-testimonials">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="why-choose-box">
                        <div class="section-header text-center ">
                            <div class="section-heading">
                                <h3 class="text-custom-black">Why <span class="text-custom-blue">Choose Us</span></h3>
                                <div class="section-description">
                                    <p class="text-light-dark">Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry.
                                        Lorem Ipsum has been the industry's standard dummy text.</p>
                                </div>
                            </div>
                        </div>
                        <div class="why-choose-wrapper">
                            <div class="why-choose-img p-relative">
                                <div class="row clearfix">
                                    <div class="col-6">
                                        <div class="choose-item animate-img"> <img
                                                src="{{ asset('assets/frontend/assets/images/services.png') }}"
                                                alt="img" class="full-width">
                                            <div class="text-wrapper">
                                                <h4 class="text-custom-white">Personalized Service</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="choose-item animate-img"> <img
                                                src="{{ asset('assets/frontend/assets/images/support.png') }}" alt="img"
                                                class="full-width">
                                            <div class="text-wrapper">
                                                <h4 class="text-custom-white">24/7 Support</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="choose-item animate-img"> <img
                                                src="{{ asset('assets/frontend/assets/images/best-price.jpg') }}"
                                                alt="img" class="full-width">
                                            <div class="text-wrapper">
                                                <h4 class="text-custom-white">Best Price</h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="choose-item animate-img"> <img
                                                src="{{ asset('assets/frontend/assets/images/company.png') }}" alt="img"
                                                class="full-width">
                                            <div class="text-wrapper">
                                                <h4 class="text-custom-white">Trusted Company</h4>
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
    </section>
    <!-- End Why choose Us -->
    <!-- Start Blog -->
    <section class="section-padding bg-light-white our_articles">
        <div class="container">
            <div class="section-header text-center">
                <div class="section-heading">
                    <h3 class="text-custom-black">Our <span class="text-custom-blue">Blog</span></h3>
                    <div class="section-description">
                        <p class="text-light-dark">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="blog-slider arrow-layout-2 row">
                        <!-- article -->
                        <article class="col-12 post slide-item">
                            <div class="post-wrapper bx-wrapper">
                                <div class="post-img animate-img">
									<a href="blog-details.html">
										<img src="{{ asset('assets/frontend/assets/images/blog/blog_grid_1.jpg') }}" class="full-width" alt="img">
									</a>
                                    <div class="post-date">
                                        <div class="text-custom-white fw-600 date bg-custom-blue">10</div>
                                        <div class="text-custom-white year">Jan 2019</div>
                                    </div>
                                </div>
                                <div class="blog-meta padding-20 bg-custom-white p-relative">
                                    <div class="post-meta mb-xl-20"><a href="blog-details.html"
                                            class="text-light-dark mr-1"><span class="text-custom-blue"><i
                                                    class="fas fa-comment"></i></span>10 Comments </a><a
                                            href="blog-details.html" class="text-light-dark mr-1"><span
                                                class="text-custom-blue"><i class="fas fa-thumbs-up"></i></span>2 Likes
                                        </a></div>
                                    <div class="post-heading">
                                        <h2><a href="blog-details.html" class="text-custom-black fw-600 fs-20">Duis
                                                Ultricies aliquet mauris
                                            </a></h2>
                                        <p class="text-light-dark no-margin">Lorem Ipsum is simply dummy text of the
                                            printing and
                                            typesetting industry. Lorem Ipsum has been the industry's...</p>
                                    </div>
                                </div>
                                <div class="post-footer">
                                    <div class="post-author"> 
										<cite class="text-custom-black">Post By 
											<a href="blog-details.html">Jhon Deo</a>
										</cite> 
									</div>
                                    <a href="blog-details.html" class="btn-first btn-submit fs-14 fs-600">Read More</a>
                                </div>
                            </div>
                        </article>
                        <!-- article -->
                        <!-- article -->
                        <article class="col-12 post slide-item">
                            <div class="post-wrapper bx-wrapper">
                                <div class="post-img animate-img"> <a href="blog-details.html"> <img
                                            src="{{ asset('assets/frontend/assets/images/blog/blog_grid_2.jpg') }}"
                                            class="full-width" alt="img"> </a>
                                    <div class="post-date">
                                        <div class="text-custom-white fw-600 date bg-custom-blue">21</div>
                                        <div class="text-custom-white year">Jan 2020</div>
                                    </div>
                                </div>
                                <div class="blog-meta padding-20 bg-custom-white p-relative">
                                    <div class="post-meta mb-xl-20"> <a href="blog-details.html"
                                            class="text-light-dark mr-1"> <span class="text-custom-blue"> <i
                                                    class="fas fa-comment"></i> </span> 2 Comments </a> <a
                                            href="blog-details.html" class="text-light-dark mr-1"> <span
                                                class="text-custom-blue"> <i class="fas fa-thumbs-up"></i> </span> 10
                                            Likes </a> </div>
                                    <div class="post-heading">
                                        <h2> <a href="blog-details.html" class="text-custom-black fw-600 fs-20">Car
                                                Rental Can Cost.</a>
                                        </h2>
                                        <p class="text-light-dark no-margin">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's...</p>
                                    </div>
                                </div>
                                <div class="post-footer">
                                    <div class="post-author">
										<cite class="text-custom-black">Post By 
											<a href="blog-details.html">Jhon Deo</a>
										</cite>
									</div>
									<a href="blog-details.html" class="btn-first btn-submit fs-14 fs-600">Read More</a>
                                </div>
                            </div>
                        </article><!-- article -->
                        <!-- article -->
                        <article class="col-12 post slide-item">
                            <div class="post-wrapper bx-wrapper">
                                <div class="post-img animate-img"><a href="blog-details.html"><img src="{{ asset('assets/frontend/assets/images/blog/blog_grid_3.jpg') }}" class="full-width" alt="img"></a>
                                    <div class="post-date">
                                        <div class="text-custom-white fw-600 date bg-custom-blue">20</div>
                                        <div class="text-custom-white year">Jan 2020</div>
                                    </div>
                                </div>
                                <div class="blog-meta padding-20 bg-custom-white p-relative">
                                    <div class="post-meta mb-xl-20"><a href="blog-details.html"
                                            class="text-light-dark mr-1"><span class="text-custom-blue"><i
                                                    class="fas fa-comment"></i></span>3 Comments </a><a
                                            href="blog-details.html" class="text-light-dark mr-1"><span
                                                class="text-custom-blue"><i class="fas fa-thumbs-up"></i></span>5 Likes
                                        </a></div>
                                    <div class="post-heading">
                                        <h2><a href="blog-details.html" class="text-custom-black fw-600 fs-20">Car
                                                Rental Different People
                                            </a></h2>
                                        <p class="text-light-dark no-margin">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's...</p>
                                    </div>
                                </div>
                                <div class="post-footer">
                                    <div class="post-author"> <cite class="text-custom-black">Post By <a
                                                href="blog-details.html">Jhon
                                                Deo</a></cite> </div>
                                    <a href="blog-details.html" class="btn-first btn-submit fs-14 fs-600">Read More</a>
                                </div>
                            </div>
                        </article>
                        <!-- article -->
                        <!-- article -->
                        <article class="col-12 post slide-item">
                            <div class="post-wrapper bx-wrapper">
                                <div class="post-img animate-img"> <a href="blog-details.html"> <img src="{{ asset('assets/frontend/assets/images/blog/blog_grid_4.jpg') }}" class="full-width" alt="img"> </a>
                                    <div class="post-date">
                                        <div class="text-custom-white fw-600 date bg-custom-blue">20</div>
                                        <div class="text-custom-white year">Jan 2019</div>
                                    </div>
                                </div>
                                <div class="blog-meta padding-20 bg-custom-white p-relative">
                                    <div class="post-meta mb-xl-20"> 
										<a href="blog-details.html" class="text-light-dark mr-1"> 
											<span class="text-custom-blue"> 
												<i class="fas fa-comment"></i> 
											</span> 3 Comments 
										</a> 
										<a href="blog-details.html" class="text-light-dark mr-1"> 
											<span class="text-custom-blue"> <i class="fas fa-thumbs-up"></i> </span> 
											20 Likes 
										</a> 
									</div>
                                    <div class="post-heading">
                                        <h2> <a href="blog-details.html" class="text-custom-black fw-600 fs-20">Truth
                                                About Car Service</a>
                                        </h2>
                                        <p class="text-light-dark no-margin">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's...</p>
                                    </div>
                                </div>
                                <div class="post-footer">
                                    <div class="post-author"><cite class="text-custom-black">Post By <a
                                                href="blog-details.html">Jhon Deo</a></cite></div><a href="blog-details.html"
                                        class="btn-first btn-submit fs-14 fs-600">Read More</a>
                                </div>
                            </div>
                        </article><!-- article -->
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Blog -->
    <!-- Start Partners -->
    <section class="section-padding partners">
        <div class="container">
            <div class="section-header text-center">
                <div class="section-heading">
                    <h3 class="text-custom-black">Our <span class="text-custom-blue">Partners</span></h3>
                    <div class="section-description">
                        <p class="text-light-dark">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem
                            Ipsum has been the industry's standard dummy text.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="partners-slider arrow-layout-2 row">
                        <div class="slide-item col-12">
                            <div class="partner-box bx-wrapper animate-img"> <a href="#"> <img
                                        src="{{ asset('assets/frontend/assets/images/logo-1-t.png') }}"
                                        class="img-fluid image-fit" alt="img"> </a> </div>
                        </div>
                        <div class="slide-item col-12">
                            <div class="partner-box bx-wrapper animate-img"> <a href="#"> <img
                                        src="{{ asset('assets/frontend/assets/images/logo-2.png') }}"
                                        class="img-fluid image-fit" alt="img"> </a> </div>
                        </div>
                        <div class="slide-item col-12">
                            <div class="partner-box bx-wrapper animate-img"> <a href="#"> <img
                                        src="{{ asset('assets/frontend/assets/images/logo-3.png') }}"
                                        class="img-fluid image-fit" alt="img"> </a> </div>
                        </div>
                        <div class="slide-item col-12">
                            <div class="partner-box bx-wrapper animate-img"> <a href="#"> <img
                                        src="{{ asset('assets/frontend/assets/images/logo-4.png') }}"
                                        class="img-fluid image-fit" alt="img"> </a> </div>
                        </div>
                        <div class="slide-item col-12">
                            <div class="partner-box bx-wrapper animate-img"> <a href="#"> <img
                                        src="{{ asset('assets/frontend/assets/images/logo-1-t.png') }}"
                                        class="img-fluid image-fit" alt="img"> </a> </div>
                        </div>
                        <div class="slide-item col-12">
                            <div class="partner-box bx-wrapper animate-img"> <a href="#"> <img
                                        src="{{ asset('assets/frontend/assets/images/logo-2.png') }}"
                                        class="img-fluid image-fit" alt="img"> </a> </div>
                        </div>
                        <div class="slide-item col-12">
                            <div class="partner-box bx-wrapper animate-img"> <a href="#"> <img
                                        src="{{ asset('assets/frontend/assets/images/logo-3.png') }}"
                                        class="img-fluid image-fit" alt="img"> </a> </div>
                        </div>
                        <div class="slide-item col-12">
                            <div class="partner-box bx-wrapper animate-img"> <a href="#"> <img
                                        src="{{ asset('assets/frontend/assets/images/logo-4.png') }}"
                                        class="img-fluid image-fit" alt="img"> </a> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Partners -->
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
    {{-- <script src="{{ asset('assets/frontend/assets/js/jquery.min.js') }}"></script> --}}
	<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

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
    <script src="{{ asset('assets/frontend/assets/js/custom.js') }}"></script><!-- /Place all Scripts Here -->
</body>

</html>