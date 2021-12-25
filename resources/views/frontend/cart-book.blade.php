@extends('frontend.layouts.app')

@section('title-menu', 'Booking')

@section('styleplus')
    <link rel="stylesheet" href="{{ asset('assets/frontend/assets/css/style-cart.css') }}">
@endsection

@section('content')
    <!-- Start Subheader -->
    <div class="subheader normal-bg section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1 class="text-custom-white">Cart Booking</h1>
                    <ul class="custom-flex justify-content-center">
                        <li class="fw-500">
                            <a href="{{route('homepage')}}" class="text-custom-white">Home</a>
                        </li>
                        <li class="active fw-500">Cart Booking</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Subheader -->
    <!-- Start Blog -->
    <section class="section-padding bg-light-white template-cart">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tabs">
                        <div class="tab-content bg-custom-white bx-wrapper padding-20">
                            <div class="tab-pane fade active show">
                                <div class="tab-inner">
                                    <div class="row">
                                        <div class="col-12">
                                            <h4 class="text-custom-black">Daftar Cart Booking</h4>
                                            <div class="cart_header">
                                                <div class="row align-items-center">
                                                    <div class="col-4 text-center">Mobil</div>
                                                    <div class="col-2">Status Penyewaan</div>
                                                    <div class="col-2 text-center">Tgl Sewa</div>
                                                    <div class="col-2 text-center">Total</div>
                                                    <div class="col-2 text-center">Bukti Pembayaran</div>
                                                </div>
                                            </div>
                                            <div class="cart_items">
                                                @foreach ($booking as $item)
                                                    <div class="cart_item js_cart_item">
                                                        <div class="ld_cart_bar"></div>
                                                        <div class="row align-items-center m-0">
                                                            <div class="col-12 col-md-12 col-lg-4">
                                                                <div class="page_cart_info d-flex align-items-center">
                                                                    <a href="#">
                                                                        <img class="w-100" src="{{ asset('images/'.$item->mobil->thumbnail) }}" alt="">
                                                                    </a>
                                                                    <div class="mini_cart_body ml-3">
                                                                        <h5 class="mini_cart_title mg__0 mb__5">
                                                                            <a href="#">{{ $item->mobil->nama }}
                                                                                <small>
                                                                                    @if ($item->dengan_sopir == 'tidak')
                                                                                        <span class="cart_price text-info">(Tanpa Sopir)</span>
                                                                                    @else
                                                                                        <span class="cart_price {{$item->sopir == null ? 'text-danger' : 'font-weight-bold'}}">{{ $item->sopir->nama ?? 'Belum Diverifikasi' }}</span>
                                                                                    @endif
                                                                                </small>
                                                                            </a>
                                                                        </h5>
                                                                        <div class="mini_cart_meta">
                                                                            <p class="cart_meta_variant"><strong>{{ $item->mobil->jenisMobil->jenis_mobil }}</strong></p>
                                                                            <p class="cart_meta_variant"><strong>{{ getStatusPengambilanRaw($item->pengambilan) }}</strong></p>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-2 col-lg-2 text-center">
                                                                <div class="cart_meta_prices price">
                                                                    <div class="cart_price">
                                                                        {{ getStatusBooking($item->status) }}
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-2 col-lg-2 text-center">
                                                                <div class="cart_meta_prices price">
                                                                    <div class="cart_price">{{ indonesianDateFrontend($item->tgl_mulai_sewa) }}<br>sampai<br>{{ indonesianDateFrontend($item->tgl_akhir_sewa) }}</div>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-2 col-lg-2 text-center">
                                                                <span class="cart-item-price fwm cd js_tt_price_it">{{ formatPrice($item->harga + $item->biaya_sopir) }}</span> <br>
                                                                <span> <small> {{ 'Sewa : '.formatPrice($item->harga) }} </small> </span> <br>
                                                                <span> <small> {{ 'Sopir : '.formatPrice($item->biaya_sopir) }} </small> </span>
                                                            </div>
                                                            <div class="col-12 col-md-2 col-lg-2 text-center">
                                                                @if ($item->status == 'dibatalkan')
                                                                    <span class="btn btn-sm btn-danger w-100 mb-2" style="pointer-events: none"> Dibatalkan </span>
                                                                @elseif ($item->status == 'expired')
                                                                    <span class="btn btn-sm btn-danger w-100 mb-2" style="pointer-events: none"> Expired </span>
                                                                @else
                                                                    @if ($item->bukti_trf)
                                                                        <a href="{{ asset('images/'.$item->bukti_trf) }}" target="_blank">
                                                                            <img class="w-100 mb-2" src="{{ asset('images/'.$item->bukti_trf) }}" alt="">
                                                                        </a>
                                                                    @else
                                                                        <button class="btn btn-primary btn-sm w-100 mb-2 countdown" data-date-created="{{ \Carbon\Carbon::parse($item->created_at) }}" data-expiry-date="{{ \Carbon\Carbon::parse($item->created_at)->addHours(24) }}">Batas Pembayaran Sewa : <span></span> </button>
                                                                        <a href="{{route('upload_bukti', $item->id)}}" class="btn btn-danger btn-sm mb-2">Upload Bukti Pembayaran</a>
                                                                    @endif
                                                                @endif
                                                                <a class="btn-second btn-small booking-view-ajax w-100" href="#" data-id="{{ $item->id }}" data-toggle="modal" data-target="#exampleModal">Detail</a>
                                                                {{-- <span class="cart-item-price fwm cd js_tt_price_it">{{ formatPrice($item->harga) }}</span> --}}
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                <div class="cart_item js_cart_item">
                                                    <div class="row align-items-center justify-content-center">
                                                        <a href="{{ route('homepage', '#search') }}" class="cart_plus-products">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="72" height="72" viewBox="0 0 24 24" fill="none">
                                                                <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm6 13h-5v5h-2v-5h-5v-2h5v-5h2v5h5v2z"/>
                                                            </svg>
                                                        </a>
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
    @include('frontend.layouts.modal-booking')
@endsection

@push('scriptplus')
    <script>
        const countdownEl = document.getElementsByClassName('countdown')
        for (let index = 0; index < countdownEl.length; index++) {
            setCountDown(countdownEl[index])
        }

        function setCountDown(element){
            const createdAt = new Date(element.getAttribute('data-date-created')).getTime();
            const expiryAt = new Date(element.getAttribute('data-expiry-date')).getTime();
            
            let x = setInterval(function() {
                let now = new Date().getTime();
                let distance = expiryAt - now;
                let days = Math.floor(distance / (1000 * 60 * 60 * 24));
                let hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                let minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((distance % (1000 * 60)) / 1000);

                element.querySelectorAll('span')[0].innerHTML = hours + "h " + minutes + "m " + seconds + "s ";
                
                if (distance < 0) {
                    clearInterval(x);
                    element.querySelectorAll('span')[0].innerHTML = "EXPIRED";
                }
            }, 1000);
        }
    </script>
    <script>
        $(document).ready(function () {
            function formatRupiah(harga) {
                const locale = 'id';
                const options = {style: 'currency', currency: 'idr', minimumFractionDigits: 0, maximumFractionDigits: 2};
                const formatter = new Intl.NumberFormat(locale, options);
                let data = formatter.format(harga);
                return data;
            }

            function tanggal(tgl) {
                if (tgl == null) {
                    return 'undefined';
                }
                const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
                let tglnya = new Date(tgl);
                let thn = tglnya.getFullYear();
                let bln = monthNames[tglnya.getMonth()];
                let hr = tglnya.getDate();
                return hr+' '+bln+' '+thn;
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $(document).on('click', '.booking-view-ajax', function (e) {
                e.preventDefault();
                let data = $(this).data('id');
                const modal = $(this).data('target');
                let url = "{{ route('databooking', ':id') }}";
                url = url.replace(':id', data);
                $.get(url, function (data) {
                    $('#judul-modal').html("Detail Booking");
                    if (data.bukti_trf != null) {
                        $(modal).find('.bukti-bayar').removeClass('d-none');
                        $(modal).find('.upload-bayar').addClass('d-none');
                        $(modal).find('.upload-bayar').removeClass('d-none').attr('href', '#');
                    } else {
                        $(modal).find('.bukti-bayar').addClass('d-none');
                        $(modal).find('.upload-bayar').removeClass('d-none').attr("href", "{{ route('bookingcar.cekIndex') }}/upload-bukti/"+data.id);

                    }
                    $(modal).find('#thumbnail-mobil').attr("src", "{{ asset('images') }}/" + data.mobil.thumbnail);
                    $(modal).find('#nama-mobil').html(data.mobil.nama+'<small class="text-secondary ml-4">('+data.mobil.jenis_mobil.jenis_mobil+')</small>');
                    $(modal).find('#capacity-mobil').html(data.mobil.jumlah_kursi);
                    $(modal).find('#harga-mobil').html(formatRupiah(data.mobil.harga));
                    $(modal).find('#description-mobil').html(data.mobil.deskripsi);
                    $(modal).find('#tanggal-mulai-sewa').html(tanggal(data.tgl_mulai_sewa));
                    $(modal).find('#tanggal-akhir-sewa').html(tanggal(data.tgl_akhir_sewa));
                    console.log(data);
                    if (data.dengan_sopir == 'ya') {
                        if (data.sopir == null) {
                            $(modal).find('#sopir').html('Menunggu Verifikasi');
                        } else {
                            $(modal).find('#sopir').html('Menggunakan Sopir dengan Nama : <b>' + data.sopir.nama + '</b>');
                        }
                    } else if (data.dengan_sopir == 'tidak') {
                        $(modal).find('#sopir').html('Tidak Menyewa Jasa Sopir');
                    }
                    if (data.pengambilan === 'diantar') {
                        $(modal).find('#diantar').html('Mobil Diantar ke Alamat : <b>' + data.alamat_antar + '</b>');
                    } else if (data.pengambilan === 'ambil_sendiri') {
                        $(modal).find('#diantar').html('Modil diambil ke Kantor');
                    }
                    $(modal).find('#total-bayar').html(formatRupiah(data.harga));
                    // console.log(data);
                    $(modal).modal('show');
                });
            })

            $('.js-select-first-disabled option:first').attr('disabled', true);
            let date = new Date();
            let date_off = new Date(Date.now() + (3600 * 1000 * 24));
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
    @include('frontend.layouts.flash')
@endpush