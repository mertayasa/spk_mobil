@extends('frontend.layouts.app')

@section('title-menu', 'Booking')


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
                    <h1 class="text-custom-white">Profil</h1>
                    <ul class="custom-flex justify-content-center">
                        <li class="fw-500">
                            <a href="{{ route('homepage') }}" class="text-custom-white">Home</a>
                        </li>
                        <li class="active fw-500">Profil</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Subheader -->


    <section class="section-padding bg-light-white booking-form">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tabs">
                        <div class="tab-content bg-custom-white bx-wrapper padding-20">
                            <div class="tab-pane fade active show">
                                <div class="tab-inner">
                                    <div class="row">
                                        @include('layouts.flash')
                                        @include('layouts.error_message')
                                        <div class="col-lg-12">
                                            <h5 class="text-custom-black">Data diri anda</h5>
                                            {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'patch']) !!}
                                                {!! Form::hidden('is_profile', true, []) !!}

                                                <div class="row">
                                                    <div class="col-12 col-md-6 pb-3 pb-md-0">
                                                        {!! Form::label('photoUser', 'Photo', ['class' => 'mb-1']) !!}
                                                        {!! Form::file('photo', ['class' => 'd-block filepond', 'id' => 'photoUser']) !!}
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-12 col-md-6 pb-3 pb-md-0">
                                                        {!! Form::label('namaUser', 'Nama ', ['class' => 'mb-1']) !!}
                                                        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'namaUser']) !!}
                                                    </div>
                                                    <div class="col-12 col-md-6 pb-3 pb-md-0">
                                                        {!! Form::label('emailUser', 'Email ', ['class' => 'mb-1']) !!}
                                                        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'emailUser']) !!}
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12 col-md-6">
                                                        {!! Form::label('telponUser', 'Telpon', ['class' => 'mb-1']) !!}
                                                        {!! Form::text('telpon', null, ['class' => 'form-control', 'id' => 'telponUser']) !!}
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        {!! Form::label('noKtpUser', 'No KTP', ['class' => 'mb-1']) !!}
                                                        {!! Form::number('no_ktp', null, ['class' => 'form-control', 'id' => 'noKtpUser']) !!}
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    @if (Request::is('*edit*'))
                                                        <div class="col-12 col-md-6">
                                                            {!! Form::label('statusUser', 'Status Aktif', ['class' => 'mb-1']) !!}
                                                            {!! Form::select('status_aktif', [0 => 'Tidak Aktif', 1 => 'Aktif'], $user->status_aktif, ['class' => 'form-control', 'id' => 'statusUser']) !!}
                                                        </div>
                                                    @endif
                                                    
                                                    <div class="col-12 col-md-6">
                                                        {!! Form::label('kelaminUser', 'Jenis Kelamin', ['class' => 'mb-3']) !!}
                                                        {!! Form::select('jenis_kelamin', [0 => 'Laki-Laki', 1 => 'Perempuan'], null, ['class' => 'form-control', 'id' => 'kelaminUser']) !!}
                                                    </div>

                                                    <div class="col-12 col-md-6">
                                                        {!! Form::label('alamatUser', 'Alamat', ['class' => 'mb-1']) !!}
                                                        {!! Form::textarea('alamat', null, ['class' => 'form-control', 'id' => 'alamatUser', 'style' => 'height:148px']) !!}
                                                    </div>
                                                </div>

                                                <hr>

                                                <div class="row mt-3">
                                                    <div class="col-12 col-md-6">
                                                        {!! Form::label('passwordUser', 'Password', ['class' => 'mb-1']) !!}
                                                        {!! Form::password('password', ['class' => 'form-control', 'id' => 'passwordUser']) !!}
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        {!! Form::label('passwordConfirmUser', 'Konfirmasi Password', ['class' => 'mb-1']) !!}
                                                        {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'passwordConfirmUser']) !!}
                                                    </div>
                                                </div>
                                                <div class="row mt-3">
                                                    <div class="col-12">
                                                        <a href="{{ url('/') }}" class="btn btn-secondary">Kembali</a>
                                                        <button class="btn btn-danger" type="submit">Update</button>
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

            @if (Request::is('*/create'))
                options = {
                acceptedFileTypes: ['image/png', 'image/jng', 'image/jpeg'],
                maxFileSize: '500KB'
                }
            @else
                imageUrl = "{{ asset('images/' . $user->photo) }}"
                options = {
                    acceptedFileTypes: ['image/png', 'image/jng', 'image/jpeg'],
                    maxFileSize: '500KB',
                    files: [{
                        source: imageUrl,
                        options:{
                        type: 'remote'
                        }
                    }],
                }
            @endif

            FilePond.create(
                document.getElementById('photoUser'), options
            );
        })
    </script>
@endpush
