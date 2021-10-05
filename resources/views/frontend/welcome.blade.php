@extends('frontend.layouts.app')

@section('title-menu', 'Home')

@section('content')
    <!-- Start Slider -->
    <div id="home-slider" class="slider p-relative">
        <div class="main-banner arrow-layout-1 ">
            @foreach ($mobil as $mob)
                <div class="slide-item">
                    <img src="{{ asset('images/'.$mob->thumbnail) }}" class="image-fit" alt="Slider">
                    <div class="transform-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="slider-content">
                                        {{-- <h1 class="text-custom-white">Upto 25% off on first booking <span class="text-custom-blue">Car</span>through your app!</h1> --}}
                                        <h1 class="text-custom-white">{{$mob->nama}}</h1>
                                        <ul class="custom">
                                            <li class="text-custom-white"> {{formatPrice($mob->harga)}} </li>
                                            <li class="text-custom-white"><i class="fas fa-car"></i> {{$mob->jumlah_kursi}} Kursi</li>
                                            <li class="text-custom-white"><i class="fas fa-laptop"></i> {{$mob->jenisMobil->jenis_mobil}} </li>
                                            <li class="text-custom-white"><i class="fas fa-headphones-alt"></i> {{ \Illuminate\Support\Str::limit($mob->deskripsi, 50) }} </li>
                                        </ul>
                                        {{-- <a href="#" data-id="#search-engine" class="btn-first btn-small go-id">Find Out More</a> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

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
	<!-- Start Product -->
	<section class="section-padding bg-light-white">
		<div class="container">
		  <div class="row">
			<div class="col-12">
			  <div class="listing-top-heading mb-xl-20">
				<h6 class="no-margin text-custom-black">Showing {{ $mobil->count() }} from {{ $countmobil }} Results on {{ request()->input('page') ? "Page - ".request()->input('page') : "Page - 1" }} </h6>
				<div class="sort-by">
                    <span class="text-custom-black fs-14 fw-600">Sort by</span>
                    <div class="group-form">
                        <form method="get" action="{{ route('homepage', '#search') }}">
                            {!! Form::hidden('id_category', request()->input('id_category')) !!}
                            {!! Form::hidden('id_name', request()->input('id_name')) !!}
                            {!! Form::hidden('id_passenger', request()->input('id_passenger')) !!}
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
                                    <img src="{{ asset('images/' . $item->thumbnail) }}" class="full-width" alt="img">
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
                                <div class="action">
                                    <a class="btn-second btn-small mobil-view-ajax" href="#" data-id="{{ $item->id }}" data-toggle="modal" data-target="#exampleModal">View</a>
                                    <form action="{{ route('bookingcar.index') }}" method="post">
                                        @csrf
                                        <button name="id_mobil" type="submit" value="{{ $item->id }}" class="btn-first btn-submit">Book</button>
                                    </form>
                                </div>
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
	<!-- End Product -->
    <!-- Start Form -->
    <section id="kriteria-section" class="section-padding section-padding-bottom bg-light-white kategori-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12">
                    <div class="tabs">
                        <div class="tab-content bg-custom-white bx-wrapper padding-20">
                            <div class="tab-pane fade active show">
                                <div class="tab-inner">
                                    <h4 class="text-custom-black text-uppercase">Sesuaikan Mobil yang Kamu Cari</h4>
                                    <form action="#" method="post">
                                        @csrf
                                        <div class="row mb-md-80">
                                            <div class="col-12">
                                                @foreach ($kriteria as $krite)
                                                    @php
                                                        $sub_kriteria = $krite->subKriteria->pluck('sub_kriteria', 'id')->toArray();
                                                        $with_default_opt =  array_merge([0 => 'Pilih '.$krite->kriteria], $sub_kriteria);
                                                    @endphp
                                                    <div class="form-group group-form">
                                                        {!! Form::label('idKriteria'.$krite->id, $krite->kriteria, ['class' => 'fs-14 text-custom-black fw-500']) !!}
                                                        {!! Form::select('kriteria'.$krite->id, $with_default_opt, null, ['class' => 'custom-select form-control-custom js-select-first-disabled select-sopir' . ($errors->has('id_driver') ? ' is-invalid' : null), 'id' => 'idKriteria'.$krite->id]) !!}
                                                        <div class="valid-feedback">Good</div>
                                                        @error('id_driver')
                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                        @else
                                                            <div class="invalid-feedback">Mohon pilih salah satu kriteria</div>
                                                        @enderror
                                                    </div>
                                                @endforeach
                                            </div>
                                            <div class="col-12">
                                                <hr class="mt-0">
                                                <button type="submit" class="btn-first btn-submit">Cari Mobil berdasar kategori</button>
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
    </section>
    <!-- End Form -->
    <!-- Start About Us -->
    <section id="tentang-section" class="section-padding about-us">
        <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-6 pl-2 pr-2 align-self-center text-left">
            <div class="about-left-side mb-md-80">
                <div class="section-header style-left">
                <div class="section-heading">
                    <h3 class="text-custom-black">Tentang Kami</h3>
                    {{-- <div class="section-description">
                        <div class="car-price"><strong>$125</strong><span>/Day</span></div>
                    </div> --}}
                </div>
                </div>
                <p class="pt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                been the industry's standard dummy text.
                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text.</p>
                <p class="pt-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has
                been the industry's standard dummy text.</p>
                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                industry's standard dummy text. Lorem Ipsum has been the industry's standard dummy text. Lorem Ipsum is
                simply dummy.</p>
                <a href="#" data-id="#search-engine" class="btn-first btn-submit go-id">Reserve Now</a>
            </div>
            </div>
            <div class="col-xl-5 col-lg-6">
            <div class="about-right-side full-height">
                <div class="about-img full-height"> 
                    <img src="{{ asset('assets/frontend/assets/images/about.jpg') }}" class="img-fluid image-fit" alt="img"> 
                </div>
            </div>
            </div>
        </div>
        </div>
    </section>
    <!-- End About Us -->
    @include('frontend.layouts.modal')
@endsection

@push('scriptplus')
    <script>
        $(document).ready(function () {
            $('.js-select-first-disabled').find('option:first').attr('disabled', true);

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
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('.mobil-view-ajax').on('click', function (e) {
                e.preventDefault();
                let data = $(this).data('id');
                const modal = $(this).data('target');
                let url = "{{ route('datamobil', ':id') }}";
                url = url.replace(':id', data);
                $.get(url, function (data) {
                    $('#judul-modal').html("Mobil Details");
                    $(modal).modal('show');
                    $(modal).find('#nama-mobil').html(data.nama);
                    $(modal).find('#harga-mobil').html(data.harga);
                    $(modal).find('#capacity-mobil').html(data.jumlah_kursi);
                    $(modal).find('#description-mobil').html(data.deskripsi);
                });
            })
        })
    </script>
    @include('frontend.layouts.flash')
@endpush