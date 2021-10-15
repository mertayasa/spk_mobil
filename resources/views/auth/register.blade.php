@extends('layouts.auth')

@section('styleplus')
    <style>
        @media screen and (max-width: 700px) {
            .w-sm-90{
                width: 95% !important;
            }
            
        }
    </style>
@endsection

@section('content')
    <section class="mt-0 mt-md-5 bg-soft d-flex align-items-center">
        <div class="container mt-5 mb-5">
            <div class="row justify-content-center form-bg-image"
                data-background-lg="../../assets/img/illustrations/signin.svg">
                <div class="col-12 d-flex align-items-center justify-content-center mx">
                    <div class="bg-white shadow border-0 rounded border-light p-4 p-lg-5 w-75 w-sm-90">
                        <div class="text-center text-md-center mb-4 mt-md-0">
                            <h1 class="mb-0 h3"> Register Akun </h1>
                        </div>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            {!! Form::hidden('status_aktif', 1, []) !!}
                            {!! Form::hidden('level', 2, []) !!}
                            {!! Form::hidden('photo', 'default/default.jpeg', []) !!}
                            <!-- Form -->
                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="name">Nama</label>
                                        <div class="input-group">
                                            <input type="text" name="name" class="form-control" placeholder="Nama"
                                                id="name" autofocus required>
                                        </div>
                                        @error('name')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="email">Email</label>
                                        <div class="input-group">
                                            <input type="email" name="email" class="form-control"
                                                placeholder="contoh@email.com" id="email" autofocus required>
                                        </div>
                                        @error('email')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="password">Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password" placeholder="Password" class="form-control"
                                                id="password" required>
                                        </div>
                                        @error('password')
                                            <span class="invalid-feedback d-block" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="confirm_password">Konfirmasi Password</label>
                                        <div class="input-group">
                                            <input type="password" name="password_confirmation" placeholder="Confirm Password"
                                                class="form-control" id="confirm_password" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <!-- Form Tambahan -->
                                    <div class="form-group mb-4">
                                        <label for="telepon">Nomor Telpon</label>
                                        <div class="input-group">
                                            {!! Form::text('telpon', null, ['placeholder' => 'Nomot Telpon (081xxxx)', 'class'=> 'form-control', 'id' => 'telepon', 'required']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="jenis_kelamin">Jenis Kelamin</label>
                                        <div class="input-group">
                                            {!! Form::select('jenis_kelamin', ['Pilih jenis kelamin', '0' => 'Laki-laki', '1' => 'Perempuan'], null, ['class'=> 'custom-select form-control', 'id' => 'jenis_kelamin', 'required']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="alamat">{{ __('Address') }}</label>
                                        <div class="input-group">
                                            {!! Form::textarea('alamat', null, ['placeholder' => 'Alamat Lengkap', 'class'=> 'form-control', 'id' => 'alamat', 'rows' => '1', 'required']) !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="form-group mb-4">
                                        <label for="no_ktp">Nomor KTP</label>
                                        <div class="input-group">
                                            {!! Form::text('no_ktp', null, ['placeholder' => 'No KTP', 'class'=> 'form-control', 'id' => 'no_ktp', 'required']) !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <!-- End of Form Tambahan -->
                            <div class="d-grid">
                                <button type="submit" class="btn btn-gray-800">{{ __('Register') }}</button>
                            </div>
                        </form>
                        <div class="d-flex justify-content-center align-items-center mt-4">
                            <span class="fw-normal">
                                Sudah punya akun ?
                                <a href="{{ route('login') }}" class="fw-bold">{{ __('Login') }}</a>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}
