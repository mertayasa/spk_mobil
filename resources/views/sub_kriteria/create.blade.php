@extends('layouts.app')

@section('content')
    <div class="py-4">
        <h3>Tambah Sub Kriteria</h3>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-12 mb-4">
                    <div class="card border-0 shadow">
                        <div class="card-body">
                            @include('layouts.flash')
                            @include('layouts.error_message')
                            {!! Form::open(['route' => 'sub_kriteria.store']) !!}
                            @include('sub_kriteria.bulk_add_form')
                            <div class="row mt-3">
                                <div class="col-12">
                                    <a href="{{ route('sub_kriteria.index') }}" class="btn btn-secondary">Kembali</a>
                                    <button class="btn btn-primary ml-3" type="submit">Simpan</button>
                                </div>
                            </div>
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
