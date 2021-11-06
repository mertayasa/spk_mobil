@extends('frontend.layouts.app')

@section('title-menu', 'Home')

@section('content')
    <!-- Start Slider -->
    <div id="home-slider" class="slider p-relative">
        <div class="main-banner arrow-layout-1 ">
            @foreach ($mobil_slider as $mob)
                <div class="slide-item">
                    <img src="{{ asset('images/'.$mob->thumbnail) }}" class="image-fit" alt="Slider">
                    <div class="transform-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-7">
                                    <div class="slider-content">
                                        {{-- <h1 class="text-custom-white">Upto 25% off on first booking <span class="text-custom-blue">Car</span>through your app!</h1> --}}
                                        <h3 class="text-custom-white mt-3">{{$mob->nama}}</h3>
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
										<form method="get" id="formSearch" action="{{ route('homepage', '#search') }}">
											<div class="row">
												<div class="col-lg-4 col-md-6">
													<div class="form-group">
                                                        {!! Form::label('idCategory', 'Kategori Mobil', ['class' => 'fs-14 text-custom-white fw-600']) !!}
														<div class="group-form">
                                                            {!! Form::select('id_category', ['all' => 'All', $navCategory], request()->input('id_category'), ['class' => 'custom-select form-control form-control-custom', 'id' => 'idCategory']) !!}
														</div>
													</div>
												</div>
												<div class="col-lg-5 col-md-6">
													<div class="form-group">
                                                        {!! Form::label('idName', 'Name Mobil', ['class' => 'fs-14 text-custom-white fw-600']) !!}
                                                        {!! Form::text('id_name', request()->input('id_name'), ['class' => 'form-control form-control-custom', 'id' => 'idName', 'placeholder' => 'Search Cars by Name']) !!}
													</div>
												</div>
												<div class="col-lg-3 col-md-12">
													<div class="row">
														<div class="col-12">
															<div class="form-group">
                                                                {!! Form::label('idPassenger', 'Jumlah Penumpang', ['class' => 'fs-14 text-custom-white fw-600']) !!}
																<div class="group-form">
                                                                    {!! Form::selectRange('id_passenger', 1, 10, request()->input('id_passenger'), ['class' => 'custom-select form-control form-control-custom', 'id' => 'idPassenger']) !!}
																</div>
															</div>
														</div>
														{{-- <div class="col-8">
															<div class="form-group">
																<label class="submit"></label>
																<button type="submit" class="btn-first btn-submit full-width btn-height">Search</button>
															</div>
														</div> --}}
													</div>
												</div>
												<div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        {!! Form::label('startDate', 'Dari Tanggal', ['class' => 'fs-14 text-custom-white fw-600']) !!}
                                                        {!! Form::text('start_date', request()->input('start_date'), ['class' => 'form-control form-control-custom datepickr-on', 'id' => 'startDate', 'placeholder' => 'dd-MM-yyyy', 'readonly' => 'readonly', 'required' => 'required']) !!}
													</div>
                                                </div>
												<div class="col-lg-4 col-md-12">
                                                    <div class="form-group">
                                                        {!! Form::label('endDate', 'Sampai Tanggal', ['class' => 'fs-14 text-custom-white fw-600']) !!}
                                                        {!! Form::text('end_date', request()->input('end_date'), ['class' => 'form-control form-control-custom datepickr-off', 'id' => 'endDate', 'placeholder' => 'dd-MM-yyyy', 'readonly' => 'readonly', 'required' => 'required']) !!}
													</div>
                                                </div>
                                                <div class="col-lg-2 col-md-6">
                                                    <div class="form-group">
                                                        <label class="submit"></label>
                                                        <button type="submit" id="btnSubmit" class="btn-first btn-submit full-width btn-height">Cari Mobil</button>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-6">
                                                    <div class="form-group">
                                                        <label class="submit"></label>
                                                        <button type="button" onclick="resetForm()" class="btn-first btn-reset full-width btn-height">Reset Form</button>
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
	<section class="section-padding bg-light-white" id="mobilSection">
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
                        @include('frontend.layouts.card_car', ['item' => $item])
                    </div>
                </div>
			@empty
                <div class="col-12">
                    <img src="{{asset('images/404_car_not_found.png')}}"  alt="" class="img-fluid w-75 mx-auto d-block">
                    <h3 class="text-center">Maaf tidak ada mobil yang sesuai</h3>
                </div>
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

    @include('frontend.saw')

    <!-- End Form -->
    <!-- Start About Us -->
    <section id="tentang-section" class="section-padding about-us">
        <div class="container">
        <div class="row align-items-stretch">
            <div class="col-xl-7 col-lg-6 pl-2 pr-2 text-left">
                <div class="about-left-side mb-md-80">
                    <div class="row">
                        <div class="col-12">
                            <div class="section-header style-left">
                                <div class="section-heading">
                                    <h3 class="text-custom-black">Tentang Kami</h3>
                                </div>
                            </div>
                            <p class="pt-2">Perusahaan Rama Jaya Rental merupakan salah satu perusahaan yang bergerak di bidang jasa penyewaan mobil dengan pasar adalah wisatawan domestik maupun mancanegara. Perusahaan ini berdiri pada tahun 2003 yang didirikan oleh Bapak I Wayan Gede Wijaya, S. H. yang berlokasi di Jl. By Pass Prof Dr Ida Bagus Mantra, Ketewel, Gianyar Bali.</p>
                        </div>
                        <div class="col-12 align-self-end">
                            <a href="#" data-id="#search-engine" class="btn-first btn-submit go-id">Sewa Mobil Sekarang</a>
                        </div>
                    </div>
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
        function resetForm(){
            $("#formSearch").trigger("reset");
            $("input[type=date]").val("");
            $("#btnSubmit").click();
        }

        $(document).ready(function () {
            $('.js-select-first-disabled').find('option:first').attr('disabled', true);

            let date = new Date();
            let date_off = new Date(Date.now() + (3600 * 1000 * 24));
            $(".datepickr-on").datepicker({
                dateFormat: "dd-MM-yyyy",
                autoClose: true,
                timepicker: false,
                minDate: date,
                onSelect: function (date) {
                    // date ? $(".datepickr").removeClass('is-invalid').addClass('is-valid') : $(".datepickr").removeClass('is-valid').addClass('is-invalid');
                    var selectedDate = new Date(date);
                    var endDate = new Date(selectedDate.getTime() + (3600 * 1000 * 24));
                    if (new Date($(".datepickr-off").val()) < new Date($(".datepickr-on").val())) {
                        $(".datepickr-off").datepicker({'minDate': endDate}).val('');
                    } else {
                        $(".datepickr-off").datepicker({'minDate': endDate});
                    }
                }
            });
            $(".datepickr-off").datepicker({
                dateFormat: "dd-MM-yyyy",
                autoClose: true,
                timepicker: false,
                minDate: date_off,
                onSelect: function (date) {
                    // date ? $(".datepickr-off").removeClass('is-invalid').addClass('is-valid') : $(".datepickr-off").removeClass('is-valid').addClass('is-invalid');
                },
                onClose: function () {
                    var dt1 = $(".datepickr-on").datepicker('getDate');
                    var dt2 = $(".datepickr-off").datepicker('getDate');
                    //check to prevent a user from entering a date below date of dt1
                    if (dt2 <= dt1) {
                        var minDate = $(".datepickr-off").datepicker('option', 'minDate');
                        $(".datepickr-off").datepicker('setDate', minDate);
                    }
                    
                }
            });

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

            function formatRupiah(harga) {
                const locale = 'id';
                const options = {style: 'currency', currency: 'idr', minimumFractionDigits: 0, maximumFractionDigits: 2};
                const formatter = new Intl.NumberFormat(locale, options);
                let data = formatter.format(harga);
                return data;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.mobil-view-ajax', function (e) {
                e.preventDefault();
                let data = $(this).data('id');
                const modal = $(this).data('target');
                let url = "{{ route('datamobil', ':id') }}";
                url = url.replace(':id', data);
                $.get(url, function (data) {
                    $('#judul-modal').html("Detail Mobil");
                    $(modal).find('#thumbnail-mobil').attr("src", "{{ asset('images') }}/" + data.thumbnail);
                    $(modal).modal('show');
                    $(modal).find('#id-mobil').val(data.id);
                    $(modal).find('#nama-mobil').html(data.nama);
                    $(modal).find('#jenis-mobil').html(data.jenis_mobil.jenis_mobil);
                    $(modal).find('#harga-mobil').html(formatRupiah(data.harga));
                    $(modal).find('#capacity-mobil').html(data.jumlah_kursi);
                    $(modal).find('#description-mobil').html(data.deskripsi);
                    // console.log(data);
                });
            })
        })
    </script>
    @include('frontend.layouts.flash')
@endpush