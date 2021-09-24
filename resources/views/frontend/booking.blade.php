@extends('frontend.layouts.app')

@section('title-menu', 'Booking')

@section('content')
    <!-- Start Subheader -->
    <div class="subheader normal-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-custom-white">Booking</h1>
                    <ul class="custom-flex justify-content-center">
                        <li class="fw-500">
                            <a href="index.html" class="text-custom-white">Home</a>
                        </li>
                        <li class="active fw-500">Booking</li>
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
                                            <h5 class="text-custom-black">Your Personal Information</h5>
                                            <form method="POST" action="{{ route('bookingcar.store') }}">
                                                @csrf
                                                <div class="row mb-md-80">
                                                    {!! Form::hidden('id_mobil', $mobil[0]->id) !!}
                                                    {!! Form::hidden('id_user', Auth::user()->id) !!}
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <img src="{{ asset('images/'.Auth::user()->photo) }}" alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="form-group">
                                                            {!! Form::label('idNameCustomer', 'Nama Anda', ['class' => 'fs-14 text-custom-black fw-500']) !!}
                                                            {!! Form::text(null, Auth::user()->nama, ['class' => 'form-control form-control-custom', 'id' => 'idNameCustomer', 'placeholder' => 'Nama Anda', 'readonly']) !!}
                                                        </div>
                                                        <div class="form-group">
                                                            {!! Form::label('idEmailCustomer', 'E-Mail Anda', ['class' => 'fs-14 text-custom-black fw-500']) !!}
                                                            {!! Form::email(null, Auth::user()->email, ['class' => 'form-control form-control-custom', 'id' => 'idEmailCustomer', 'placeholder' => 'Email Anda', 'readonly']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <hr>
                                                    </div>
                                                    <div class="col-12">
                                                        <h5 class="text-custom-black">Your Booking Information</h5>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!! Form::label('idDateFrom', 'Tanggal Sewa', ['class' => 'fs-14 text-custom-black fw-500']) !!}
                                                            <div class="input-group group-form">
                                                                {!! Form::text('id_date_from', null, ['class' => 'form-control form-control-custom datepickr', 'id' => 'idDateFrom', 'placeholder' => 'mm/dd/yyyy', 'readonly', 'required']) !!}
                                                                <span class="input-group-append"> <i class="far fa-calendar"></i> </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!! Form::label('idDateTo', 'Tanggal Kembali', ['class' => 'fs-14 text-custom-black fw-500']) !!}
                                                            <div class="input-group group-form">
                                                                {!! Form::text('id_date_to', null, ['class' => 'form-control form-control-custom datepickr-off', 'id' => 'idDateTo', 'placeholder' => 'mm/dd/yyyy', 'readonly', 'required']) !!}
                                                                <span class="input-group-append"> <i class="far fa-calendar"></i> </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group group-form">
                                                            {!! Form::label('idDriver', 'Pilih Sopir', ['class' => 'fs-14 text-custom-black fw-500']) !!}
                                                            {!! Form::select('id_driver', [null => 'Pilih Sopir', $navSopir], null, ['class' => 'custom-select form-control form-control-custom js-select-first-disabled', 'id' => 'idDriver', 'required']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            {!! Form::label('idCatatan', 'Catatan', ['class' => 'mb-1']) !!}
                                                            {!! Form::textarea('id_catatan', null, ['class' => 'form-control form-control-custom', 'id' => 'idCatatan', 'style' => 'height:108px']) !!}
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <hr class="mt-0">
                                                        <div class="form-group">
                                                            <label class="custom-checkbox">
                                                                <input type="checkbox" name="#">
                                                                <span class="checkmark"></span> By continuing, you agree to the <a href="#" class="text-custom-blue">Terms and Conditions.</a> 
                                                            </label>
                                                        </div>
                                                        <button type="submit" class="btn-first btn-submit">Confirm Booking</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-12">
                                                <div class="car-grid mb-xl-30">
                                                    <div class="car-grid-wrapper bx-wrapper">
                                                        <div class="image-sec animate-img"> 
                                                            <a href="#"> <img src="{{ asset('images/' . $mobil[0]->thumbnail) }}" class="full-width" alt="img"></a> 
                                                        </div>
                                                        <div class="car-grid-caption padding-20 bg-custom-white p-relative">
                                                            <h4 class="title fs-16">
                                                                <a href="#" class="text-custom-black">
                                                                    {{ $mobil[0]->nama }}<small class="text-light-dark">Per Day</small>
                                                                </a>
                                                            </h4>
                                                            <span class="price from"><small>From</small></span>
                                                            <span class="js-harga harga-0 price">{{ $mobil[0]->harga }}</span>
                                                            {{-- <div class="action"> 
                                                                <a class="btn-second btn-small" href="#">View</a> 
                                                                <a class="btn-first btn-submit" href="#">Book</a> 
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="need-help bx-wrapper padding-20">
                                                    <h5 class="text-custom-black">Need Help?.</h5>
                                                    <p class="text-light-dark">We would be more than happy to help you. Our team advisor are
                                                    24/7 at your service to help you.</p>
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
            $('.js-select-first-disabled option:first').attr('disabled', true);
            let date = new Date();
            let date_off = new Date(Date.now() + (3600 * 1000 * 24));
            // console.log(date_off);
            $(".datepickr").datepicker({
                dateFormat: "dd-MM-yyyy",
                timepicker: false,
                minDate: date,
                onSelect: function (date) {
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
            $(window).on('load', function () {
                $('.loader').removeClass('go');
            })
        })
    </script>
@endpush