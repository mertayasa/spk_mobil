@extends('layouts.app')

@section('content')
<div class="py-4">
    <h3>Kriteria SAW Mobil</h3>
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
                                <h2 class="fs-5 fw-bold mb-0">Tabel Kriteria SAW Mobil</h2>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mt-3">
                        @include('saw.tabel_perhitungan')
                    </div>
                </div>
                {{-- <div class="card border-0 shadow mt-5">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="fs-5 fw-bold mb-0">Perankingan Mobil</h2>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mt-3">
                        @include('saw.tabel_perankingan')
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</div>
@endsection
