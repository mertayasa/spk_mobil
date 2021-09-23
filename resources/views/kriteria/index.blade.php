@extends('layouts.app')

@section('content')
<div class="py-4">
    <h3>Management Kriteria</h3>
</div>
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12 mb-4">
              @include('layouts.flash')
                <div class="card border-0 shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="fs-5 fw-bold mb-0">Data Kriteria</h2>
                            </div>
                            <div class="col text-end">
                                <a href="{{route('kriteria.create')}}" class="btn btn-sm btn-primary">Tambah Kriteria</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mt-3">
                        @include('kriteria.datatable')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
