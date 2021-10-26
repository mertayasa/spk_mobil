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
                            <a href="{{route('homepage')}}" class="text-custom-white">Home</a>
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
                                            <h5 class="text-custom-black">Data diri anda</h5>
                                            <form action="{{ route('bookingcar.store') }}" method="post" id="form-booking">
                                                @csrf
                                                <div class="row mb-md-80">
                                                    {!! Form::hidden('id_mobil', $mobil->id, ['id' => 'idMobil']) !!}
                                                    {!! Form::hidden('id_user', Auth::user()->id) !!}
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
                                                        <h5 class="text-custom-black">Cek Ketersediaan</h5>
                                                    </div>
                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!! Form::label('idDateFrom', 'Tanggal Sewa', ['class' => 'fs-14 text-custom-black fw-500']) !!}
                                                            <div class="input-group group-form">
                                                                {!! Form::text('id_date_from', null, ['class' => 'form-control form-control-custom datepickr-on' . ($errors->has('id_date_from') ? ' is-invalid' : null), 'id' => 'idDateFrom', 'placeholder' => 'mm/dd/yyyy', 'readonly' => 'readonly', 'required' => 'required']) !!}
                                                                <div class="valid-feedback">Good</div>
                                                                @error('id_date_from')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @else
                                                                    <div class="invalid-feedback">Mohon pilih tgl mulai sewa</div>
                                                                @enderror
                                                                <span class="input-group-append"> <i class="far fa-calendar"></i> </span>
                                                                <div id="reset-date-off" class="d-none">abaikan</div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            {!! Form::label('idDateTo', 'Tanggal Kembali', ['class' => 'fs-14 text-custom-black fw-500']) !!}
                                                            <div class="input-group group-form">
                                                                {!! Form::text('id_date_to', null, ['class' => 'form-control form-control-custom datepickr-off' . ($errors->has('id_date_to') ? ' is-invalid' : null), 'id' => 'idDateTo', 'placeholder' => 'mm/dd/yyyy', 'readonly' => 'readonly', 'required' => 'required']) !!}
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

                                                    <div class="col-12">
                                                        @if (session()->has('date_unavailable'))
                                                            <span class="mb-2 d-inline-block text-danger" id="errorDateSession">{{session()->get('date_unavailable')}}</span>
                                                        @endif
                                                        <span class="mb-2 d-none" id="availableStatus"></span>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <button type="button" data-url="{{url('bookingcar/check-available')}}" class="btn-submit py-2 mb-3" id="btnAvailablity">Cek Ketersediaan</button>
                                                    </div>
                                                
                                                    <div class="d-none col-12 px-0" id="noteAndSubmit">
                                                        <div class="col-12">
                                                            <hr class="mt-0">
                                                            <div class="form-group">
                                                                <label class="custom-checkbox">
                                                                    <input type="checkbox" name="dengan_sopir">
                                                                    <span class="checkmark"></span> Apakah anda memerlukan sopir ?
                                                                </label>
                                                            </div>
                                                            <div class="form-group">
                                                                <label class="custom-checkbox">
                                                                    <input type="checkbox" name="pengambilan" id="checkDelivery">
                                                                    <span class="checkmark"></span> Apakah mobil perlu diantar ke lokasi anda ?
                                                                </label>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-12">
                                                            <div class="form-group d-none" id="alamatBox">
                                                                {!! Form::label('idAlamat', 'Alamat Pengantaran', ['class' => 'mb-1']) !!}
                                                                {!! Form::textarea('id_alamat', null, ['class' => 'form-control form-control-custom catatan-book' . ($errors->has('id_alamat') ? ' is-invalid' : null), 'id' => 'idAlamat', 'rows' => '5' ]) !!}
                                                                <div class="valid-feedback">Good</div>
                                                                @error('id_alamat')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @else
                                                                    <div class="invalid-feedback">Mohon isi alamat pengantaran</div>
                                                                @enderror
                                                            </div>

                                                            <div class="form-group">
                                                                {!! Form::label('idCatatan', 'Catatan', ['class' => 'mb-1']) !!}
                                                                {!! Form::textarea('id_catatan', null, ['class' => 'form-control form-control-custom catatan-book' . ($errors->has('id_catatan') ? ' is-invalid' : null), 'id' => 'idCatatan', 'rows' => '5' ]) !!}
                                                                <div class="valid-feedback">Good</div>
                                                                @error('id_catatan')
                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                @else
                                                                    <div class="invalid-feedback">Mohon isi catatan untuk kami</div>
                                                                @enderror
                                                            </div>
                                                            <button type="submit" class="btn-first btn-submit">Booking Sekarang</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="car-grid mb-xl-30">
                                                        @include('frontend.layouts.card_car', ['item' => $mobil, 'hide_description' => true])
                                                    </div>
                                                <div class="need-help bx-wrapper padding-20">
                                                    <h5 class="text-custom-black">Butuh Bantuan</h5>
                                                    <p class="text-light-dark">Tim kami siap membantu anda 24/7</p>
                                                    <ul class="custom">
                                                        <li class="text-custom-blue fs-18"> 
                                                            <i class="fas fa-phone-alt"></i> 
                                                            <a href="#" class="text-light-dark">(+347) 123 456 7890</a> 
                                                        </li>
                                                        <li class="text-custom-blue fs-18"> 
                                                            <i class="fas fa-envelope"></i> 
                                                            <a href="#" class="text-light-dark fs-14">help@domain.com</a> 
                                                        </li>
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

        // function showAlamatBox(element){
        //     console.log(element)
        // }

        const checkDelivery = document.getElementById('checkDelivery')
        const btnAvailablity = document.getElementById('btnAvailablity')

        checkDelivery.addEventListener('click', function(event){
            // console.log(event.target)
            const alamatBox = document.getElementById('alamatBox')

            if (event.target.checked == true){
                alamatBox.classList.remove('d-none')
            }else{
                alamatBox.classList.add('d-none')
            }
        })

        btnAvailablity.addEventListener('click', (event) => {
            event.preventDefault()
            const startDate = document.getElementById('idDateFrom')
            const endDate = document.getElementById('idDateTo')
            const idMobil = document.getElementById('idMobil')
            const noteAndSubmit = document.getElementById('noteAndSubmit')
            const errorDateSession = document.getElementById('errorDateSession')

            if(errorDateSession){
                errorDateSession.remove()
            }

            if(startDate.value.length == 0){
                showAlert('Harap masukkan tanggal mulai sewa', 'error')
                return
            }

            if(endDate.value.length == 0){
                showAlert('Harap masukkan tanggal akhir sewa', 'error')
                return
            }

            if(idMobil.value.length == 0){
                showAlert('Terjadi kesalahan mohon muat ulang halaman', 'error')
                return
            }

            
            btnCheckDiantar.checked == true ? formAlamatDiantar.parentNode.classList.remove('d-none') : formAlamatDiantar.parentNode.classList.add('d-none');

            toogleAvailableStatus('hide')
            
            const url = event.target.getAttribute('data-url') +'/'+ idMobil.value +'/'+ startDate.value +'/'+ endDate.value
            noteAndSubmit.classList.add('d-none')
            console.log(url)

            fetch(url, {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                method: 'GET',
            })
            .then(response => response.json())
            .then(response => {
                console.log(response)
                if(response.code == 1){
                    toogleAvailableStatus('show', response.message)
                    noteAndSubmit.classList.remove('d-none')
                    return ''
                }

                if(response.code == 0){
                    toogleAvailableStatus('hide')
                    showAlert(response.message, 'error')
                    return ''
                }

                if(response.code == undefined || response.code == null){
                    toogleAvailableStatus('hide')
                    showAlert(response.message, 'error')
                    return ''
                }

                throw ''
            })
            .catch(errror => {
                toogleAvailableStatus('hide')
                showAlert('Gagal mendapatkan informasi ketersediaan', 'error')
                console.log(errror)
            })
        })

        function toogleAvailableStatus(state, message = null){
            const availableStatus = document.getElementById('availableStatus')
            
            if(state == 'hide'){
                availableStatus.classList.remove('d-inline-block', 'text-success')
                availableStatus.classList.add('d-none')
            }else if(state == 'show'){
                availableStatus.classList.remove('d-none')
                availableStatus.classList.add('d-inline-block', 'text-success')
                availableStatus.innerHTML = message ?? '-'
            }else{
                availableStatus.classList.remove('d-inline-block', 'text-success')
                availableStatus.classList.add('d-none')
            }
        }


        $(document).ready(function () {

            $('form#form-booking').on('submit', function (e) {
                if (!checkValidate()) {
                    e.preventDefault();
                }
            })

            function checkValidate() {
                let wrong = 0;
                if ($('#diantarkah').is(':checked')) {
                    if (!$('#idAlamatDiantar').val()) {
                        $('#idAlamatDiantar').removeClass('is-valid').addClass('is-invalid');
                        wrong = wrong + 1;
                    } else {
                        $('#idAlamatDiantar').removeClass('is-invalid').addClass('is-valid');
                    }
                } else {
                    $('#idAlamatDiantar').removeClass('is-invalid is-valid')
                }

                if (!$('#idCatatan').val()) {
                    $('#idCatatan').removeClass('is-valid').addClass('is-invalid');
                    wrong = wrong + 1;
                } else {
                    $('#idCatatan').removeClass('is-invalid').addClass('is-valid');
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
            let date_off = new Date(Date.now() + (3600 * 1000 * 24));
            $(".datepickr-on").datepicker({
                dateFormat: "dd-MM-yyyy",
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