@extends('frontend.layouts.app')

@section('title-menu', 'Home')

@section('content')
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
										<form method="get" action="{{ route('homepage', '#search') }}">
											<div class="row">
												<div class="col-lg-3 col-md-6">
													<div class="form-group">
                                                        {!! Form::label('idCategory', 'Category Cars', ['class' => 'fs-14 text-custom-white fw-600']) !!}
														<div class="group-form">
                                                            {!! Form::select('id_category', ['all' => 'All', $navCategory], request()->input('id_category'), ['class' => 'custom-select form-control form-control-custom', 'id' => 'idCategory']) !!}
														</div>
													</div>
												</div>
												<div class="col-lg-5 col-md-6">
													<div class="form-group">
                                                        {!! Form::label('idName', 'Name Cars', ['class' => 'fs-14 text-custom-white fw-600']) !!}
                                                        {!! Form::text('id_name', request()->input('id_name'), ['class' => 'form-control form-control-custom', 'id' => 'idName', 'placeholder' => 'Search Cars by Name']) !!}
													</div>
												</div>
												<div class="col-lg-4 col-md-12">
													<div class="row">
														<div class="col-4">
															<div class="form-group">
                                                                {!! Form::label('idPassenger', 'Passenger', ['class' => 'fs-14 text-custom-white fw-600']) !!}
																<div class="group-form">
                                                                    {!! Form::selectRange('id_passenger', 1, 10, request()->input('id_passenger'), ['class' => 'custom-select form-control form-control-custom', 'id' => 'idPassenger']) !!}
																</div>
															</div>
														</div>
														<div class="col-8">
															<div class="form-group">
																<label class="submit"></label>
																<button type="submit" class="btn-first btn-submit full-width btn-height">Search</button>
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
				<h6 class="no-margin text-custom-black">Showing {{ $mobil->count() }} - {{ $countmobil }} Results</h6>
				<div class="sort-by">
                    <span class="text-custom-black fs-14 fw-600">Sort by</span>
                    <div class="group-form">
                        <form method="get" action="{{ route('homepage', '#search') }}">
                            <input type="hidden" name="id_category" value="{{ request()->input('id_category') }}">
                            <input type="hidden" name="id_name" value="{{ request()->input('id_name') }}">
                            <input type="hidden" name="id_passenger" value="{{ request()->input('id_passenger') }}">
                            {!! Form::select('id_sort', ['asc' => 'A to Z', 'desc' => 'Z to A'], request()->input('id_sort'), ['class' => 'form-control form-control-custom custom-select custom-az', 'onchange' => 'this.form.submit()']) !!}
                        </form>
                    </div>
				</div>
			  </div>
			</div>
			@forelse ($mobil as $index => $item)
			<div class=" col-lg-4 col-md-6">
				<div class="car-grid mb-xl-30">
				  <div class="car-grid-wrapper car-grid bx-wrapper">
					<div class="image-sec animate-img">
						<a href="#">
							<img src="{{ asset('assets/frontend/assets/images/cars/1.png') }}" class="full-width" alt="img">
						</a>
					</div>
					<div class="car-grid-caption padding-20 bg-custom-white p-relative">
					  <h4 class="title fs-16">
						  <a href="#" class="text-custom-black">
							  {{ $item->nama }}<small class="text-light-dark">Per Day</small>
						  </a>
					  </h4>
					  <span class="price from"><small>From</small></span>
					  <span class="js-harga harga-{{ $index }} price">{{ $item->harga }}</span>
					  <p>{{ $item->jenisMobil->jenis_mobil }}</p>
					  <p>{{ $item->deskripsi }}</p>
					  <div class="action"><a class="btn-second btn-small" href="#">View</a><a class="btn-first btn-submit"
						  href="#">Book</a></div>
					</div>
				  </div>
				</div>
			  </div>
			@empty
				Kosong ?
			@endforelse
		  </div>
		  <div class="row">
			<div class="col-12">
			  <nav>
                {{ $mobil->appends(request()->input())->links('pagination::spk-pagination') }}
			  </nav>
			</div>
		  </div>
		</div>
	</section>
	<!-- End Blog -->
@endsection

@push('scriptplus')
    <script>
        $(document).ready(function () {
            $(window).on('load', function () {
                if (this.location.hash == "#search") {
                    $("html,body").animate({
                        scrollTop : $('#search-engine').offset().top - $('.header .navigation-wrapper').outerHeight()
                    }, {
                        complete : function () {
                            $('.loader').removeClass('go');
                        }
                    })
                } else {
                    $('.loader').removeClass('go');
                }
            })
        })
    </script>
@endpush