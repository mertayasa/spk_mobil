@extends('frontend.layouts.app')

@section('title-menu', 'Bukti Bayar')

@section('style-app')
    <link type="text/css" href="{{asset('css/app.css')}}" rel="stylesheet">
@endsection

@section('js-app')
    <script src="{{asset('js/app.js')}}"></script>
@endsection

@section('content')
    <!-- Start Subheader -->
    <div class="subheader normal-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-custom-white">Upload Bukti Pembayaran</h1>
                    <ul class="custom-flex justify-content-center">
                        <li class="fw-500">
                            <a href="{{route('homepage')}}" class="text-custom-white">Home</a>
                        </li>
                        <li class="fw-500">
                            <a href="{{route('cart.index')}}" class="text-custom-white">Cart Booking</a>
                        </li>
                        <li class="active fw-500">Upload Bukti Pembayaran</li>
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
                                        <div class="col-12">
                                            <h5 class="text-custom-black">Data Booking</h5>
                                            <div class="row">
                                                <div class="col-lg-4 col-12">
                                                    <div class="car-grid">
                                                        @include('frontend.layouts.card_car', ['item' => $booking->mobil, 'hide_name_price_description' => true])
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-12">
                                                    <div class="car-grid-caption bg-custom-white p-relative">
                                                        <h4 class="title fs-20">
                                                            <a href="#" class="text-custom-blue ">
                                                                {{ $booking->mobil->nama }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-lg-6 col-12">
                                                            <p class="m-0">Mobil mulai disewa tanggal :</p>
                                                            <p>{{ $booking->tgl_mulai_sewa }}</p>
                                                        </div>
                                                        <div class="col-lg-6 col-12">
                                                            Mobil berakhir disewa tanggal :
                                                            <p>{{ $booking->tgl_akhir_sewa }}</p>
                                                        </div>
                                                    </div>
                                                    <p class="m-0">Total Pembayaran</p>
                                                    <div class="car-grid-caption bg-custom-white p-relative">
                                                        <h3 class="title fs-20">
                                                            <a href="#" class="text-custom-black">
                                                                {{ formatPrice($booking->harga) }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <hr>
                                        </div>
                                        <div class="col-12">
                                            <h5 class="text-custom-black">Form Bukti Pembayaran</h5>
                                            {!! Form::model(null, ['route' => ['bookingcar.kirim_bukti', $booking->id], 'method' => 'patch']) !!}
                                                <div class="row">
                                                    <div class="col-lg-6 col-12">
                                                        <p class="m-0">BNI</p>
                                                        <p>939390438i943803 a.n. Siapa</p>
                                                        <p class="m-0">BRI</p>
                                                        <p>939390438i943803 a.n. Siapa</p>
                                                    </div>
                                                    <div class="col-lg-6 col-12">
                                                        <p class="m-0">BCA</p>
                                                        <p>939390438i943803 a.n. Siapa</p>
                                                    </div>
                                                    <div class="col-12">
                                                        <div class="form-group">
                                                            {!! Form::label('idUploadBukti', 'Upload Bukti Pembayaran', ['class' => 'mb-1']) !!}
                                                            {!! Form::file('bukti_trf', ['class' => 'd-block filepond', 'id' => 'idUploadBukti']) !!}
                                                            <div class="valid-feedback">Good</div>
                                                            @error('bukti_trf')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @else
                                                                <div class="invalid-feedback">Mohon isi bukti pembayaran</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-12">
                                                        <hr class="mt-0">
                                                        <button type="submit" class="btn-first btn-submit">Kirim Upload Bukti</button>
                                                    </div>
                                                </div>
                                            {!! Form::close() !!}
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
        document.addEventListener('DOMContentLoaded', function() {
            FilePond.registerPlugin(
                FilePondPluginFileEncode,
                FilePondPluginFileValidateSize,
                FilePondPluginFileValidateType,
                FilePondPluginImageExifOrientation,
                FilePondPluginImagePreview
            );

            let options
            let imageUrl
            const url = window.location

            options = {
            acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
            maxFileSize: '500KB'
            }

            FilePond.create(
                document.getElementById('idUploadBukti'), options
            );
        })
    </script>
    <script>
        $(window).on('load', function () {
            $('.loader').removeClass('go');
        })
    </script>
    @include('frontend.layouts.flash')
@endpush