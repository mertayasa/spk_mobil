@extends('layouts.app')

@section('content')
<div class="py-4">
    <h3>Management Pengguna</h3>
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
                                <h2 class="fs-5 fw-bold mb-0">Data Pengguna</h2>
                            </div>
                            <div class="col text-end">
                                <a href="{{route('user.create')}}" class="btn btn-sm btn-primary">Tambah Pengguna</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mt-3">
                        @include('user.datatable')
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
