@extends('frontend.layouts.app')

@section('title-menu', 'Edit Booking')

@section('content')
    <!-- Start Subheader -->
    <div class="subheader normal-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-custom-white">Edit Booking</h1>
                    <ul class="custom-flex justify-content-center">
                        <li class="fw-500">
                            <a href="{{route('homepage')}}" class="text-custom-white">Home</a>
                        </li>
                        <li class="fw-500">
                            <a href="{{route('bookingcar.cart')}}" class="text-custom-white">Cart Booking</a>
                        </li>
                        <li class="active fw-500">Edit Booking</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Subheader -->
    <!-- Start Blog -->
    <section class="section-padding bg-light-white booking-form">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tabs">
                        <div class="tab-content bg-custom-white bx-wrapper padding-20">
                            <div class="tab-pane fade active show">
                                <div class="tab-inner">
                                    <div class="row">
                                        <div class="col-lg-8">
                                            <h5 class="text-custom-black">Data diri anda</h5>
                                            <form action="{{ route('bookingcar.edit') }}" method="POST" id="form-booking">
                                                @method('PATCH')
                                                @csrf
                                                {!! Form::hidden('id-booking', $bookingWhere->id, []) !!}
                                                <div class="row mb-md-80">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <img src="{{ asset('images/'.Auth::user()->photo) }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            {!! Form::label('idNameCustomer', 'Nama Anda', ['class' => 'fs-14 text-custom-black fw-500']) !!}
                                                            {!! Form::text(null, Auth::user()->nama, ['class' => 'form-control form-control-custom', 'id' => 'idNameCustomer', 'placeholder' => 'Nama Anda', 'readonly' => 'readonly']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('idEmailCustomer', 'E-Mail Anda', ['class' => 'fs-14 text-custom-black fw-500']) !!}
                                                            {!! Form::email(null, Auth::user()->email, ['class' => 'form-control form-control-custom', 'id' => 'idEmailCustomer', 'placeholder' => 'Email Anda', 'readonly' => 'readonly']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <hr>
                                                    </div>
                                                    <div class="col-12">
                                                        <h5 class="text-custom-black">Informasi Booking</h5>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!! Form::label('idDateFrom', 'Tanggal Sewa', ['class' => 'fs-14 text-custom-black fw-500']) !!}
                                                            <div class="input-group group-form">
                                                                {!! Form::text('id_date_from', indonesianDateFrontend($bookingWhere->tgl_mulai_sewa), ['class' => 'form-control form-control-custom datepickr' . ($errors->has('id_date_from') ? ' is-invalid' : null), 'id' => 'idDateFrom', 'placeholder' => 'mm/dd/yyyy', 'readonly' => 'readonly', 'required' => 'required']) !!}
                                                                <div class="valid-feedback">Good</div>
                                                                @error('id_date_from')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @else
                                                                    <div class="invalid-feedback">Mohon pilih tgl mulai sewa</div>
                                                                @enderror
                                                                <span class="input-group-append"> <i class="far fa-calendar"></i> </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!! Form::label('idDateTo', 'Tanggal Kembali', ['class' => 'fs-14 text-custom-black fw-500']) !!}
                                                            <div class="input-group group-form">
                                                                {!! Form::text('id_date_to', indonesianDateFrontend($bookingWhere->tgl_akhir_sewa), ['class' => 'form-control form-control-custom datepickr-off' . ($errors->has('id_date_to') ? ' is-invalid' : null), 'id' => 'idDateTo', 'placeholder' => 'mm/dd/yyyy', 'readonly' => 'readonly', 'required' => 'required']) !!}
                                                                <div class="valid-feedback">Good</div>
                                                                @error('id_date_to')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @else
                                                                    <div class="invalid-feedback">Mohon pilih tgl berakhir sewa</div>
                                                                @enderror
                                                                <span class="input-group-append spantgloff"> <i class="far fa-calendar"></i> </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group group-form">
                                                            {!! Form::label('idDriver', 'Pilih Sopir', ['class' => 'fs-14 text-custom-black fw-500']) !!}
                                                            {!! Form::select('id_driver', [null => 'Pilih Sopir', $navSopir], $bookingWhere->id_sopir, ['class' => 'custom-select form-control-custom js-select-first-disabled select-sopir' . ($errors->has('id_driver') ? ' is-invalid' : null), 'id' => 'idDriver']) !!}
                                                            <div class="valid-feedback">Good</div>
                                                            @error('id_driver')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @else
                                                                <div class="invalid-feedback">Mohon pilih sopir anda</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {!! Form::label('idCatatan', 'Catatan', ['class' => 'mb-1']) !!}
                                                            {!! Form::textarea('id_catatan', $bookingWhere->deskripsi, ['class' => 'form-control form-control-custom catatan-book' . ($errors->has('id_catatan') ? ' is-invalid' : null), 'id' => 'idCatatan', 'rows' => '5' ]) !!}
                                                            <div class="valid-feedback">Good</div>
                                                            @error('id_catatan')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @else
                                                                <div class="invalid-feedback">Mohon isi catatan untuk kami</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <hr class="mt-0">
                                                        {{-- <div class="form-group">
                                                            <label class="custom-checkbox">
                                                                <input type="checkbox" name="#">
                                                                <span class="checkmark"></span> By continuing, you agree to the <a href="#" class="text-custom-blue">Terms and Conditions.</a> 
                                                            </label>
                                                        </div> --}}
                                                        <button type="submit" class="btn-first btn-submit btn-update">Update Booking</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="car-grid mb-xl-30">
                                                        @include('frontend.layouts.card_car', ['item' => $bookingWhere->mobil, 'hide_description' => true])
                                                    </div>
                                                <div class="need-help bx-wrapper padding-20">
                                                    <h5 class="text-custom-black">Butuh Bantuan</h5>
                                                    <p class="text-light-dark">Tim kami siap membantu anda 24/7</p>
                                                    <ul class="custom">
                                                    <li class="text-custom-blue fs-18"> <i class="fas fa-phone-alt"></i> <a href="#"
                                                        class="text-light-dark">(+347) 123 456 7890</a> </li>
                                                    <li class="text-custom-blue fs-18"> <i class="fas fa-envelope"></i> <a href="#"
                                                        class="text-light-dark fs-14">help@domain.com</a> </li>
                                                    </ul>
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
    </section>
    <!-- End Blog -->
@endsection

@push('scriptplus')
    <script>
        $(document).ready(function () {

            $('form#form-booking').on('submit', function (e) {
                if (!checkValidate()) {
                    e.preventDefault();
                }
            })

            function checkValidate() {
                let wrong = 0;

                if (!$('.datepickr').val()) {
                    $('.datepickr').removeClass('is-valid').addClass('is-invalid');
                    wrong = wrong + 1;
                } else {
                    $('.datepickr').removeClass('is-invalid').addClass('is-valid');
                }

                if (!$('.datepickr-off').val()) {
                    $('.datepickr-off').removeClass('is-valid').addClass('is-invalid');
                    wrong = wrong + 1;
                } else {
                    $('.datepickr-off').removeClass('is-invalid').addClass('is-valid');
                }

                if (!$('.select-sopir').val()) {
                    $('.select-sopir').removeClass('is-valid').addClass('is-invalid');
                    wrong = wrong + 1;
                } else {
                    $('.select-sopir').removeClass('is-invalid').addClass('is-valid');
                }

                if (!$('.catatan-book').val()) {
                    $('.catatan-book').removeClass('is-valid').addClass('is-invalid');
                    wrong = wrong + 1;
                } else {
                    $('.catatan-book').removeClass('is-invalid').addClass('is-valid');
                }

                if (wrong > 0) {
                    wrong = 0;
                    return false;
                } else {
                    return true;
                }
            }


            $('.js-select-first-disabled option:first').attr('disabled', true);
            let date = new Date();
            let date_off = new Date($(".datepickr").val());
                date_off.setDate(date_off.getDate() + 1);
            console.log(date_off);
            $(".datepickr").datepicker({
                dateFormat: "dd-MM-yyyy",
                timepicker: false,
                minDate: date,
                onSelect: function (date) {
                    date ? $(".datepickr").removeClass('is-invalid').addClass('is-valid') : $(".datepickr").removeClass('is-valid').addClass('is-invalid');
                    var selectedDate = new Date(date);
                    var msecsInADay = 86400000;
                    var endDate = new Date(selectedDate.getTime() + (3600 * 1000 * 24));
                    $(".datepickr-off").datepicker({'minDate': endDate});
                }
            });
            $(".datepickr-off").datepicker({
                dateFormat: "dd-MM-yyyy",
                timepicker: false,
                minDate: date_off,
                onSelect: function (date) {
                    date ? $(".datepickr-off").removeClass('is-invalid').addClass('is-valid') : $(".datepickr-off").removeClass('is-valid').addClass('is-invalid');
                },
                onClose: function () {
                    var dt1 = $(".datepickr").datepicker('getDate');
                    var dt2 = $(".datepickr-off").datepicker('getDate');
                    //check to prevent a user from entering a date below date of dt1
                    if (dt2 <= dt1) {
                        var minDate = $(".datepickr-off").datepicker('option', 'minDate');
                        $(".datepickr-off").datepicker('setDate', minDate);
                    }
                    
                }
            });
            $(".catatan-book").on('keyup', function () {
                $(this).val() ? $(this).removeClass('is-invalid').addClass('is-valid') : $(this).removeClass('is-valid').addClass('is-invalid');
            })
            $(window).on('load', function () {
                $(".select-sopir .list").on('click', function () {
                    $(".select-sopir").removeClass('is-invalid').addClass('is-valid');
                })
                $('.loader').removeClass('go');
            })
        })
    </script>
@endpush