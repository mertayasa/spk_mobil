@extends('layouts.app')

@section('content')
<div class="py-4">
    <h3>Management Sub Kriteria</h3>
</div>
<div class="row">
    <div class="col-12">
        <div class="row">
            <div class="col-12 mb-4">
              @include('layouts.flash')
                <div class="alert alert-danger alert-block {{$is_same == true ? 'd-none' : ''}}" id="alertNotSame">
                    <strong>Jumlah sub kriteria tidak sama, perhitungan SAW tidak dapat dilakukan</strong>
                </div>
                <div class="card border-0 shadow">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">
                                <h2 class="fs-5 fw-bold mb-0">Data Sub Kriteria</h2>
                            </div>
                            <div class="col text-end">
                                <a href="{{route('sub_kriteria.create')}}" class="btn btn-sm btn-primary">Tambah Sub Kriteria</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive mt-3">
                        {!! $dataTable->table(['width' => '100%']) !!}
                        {{-- @include('sub_kriteria.datatable') --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<style>
    td:first-child {
        color: white; 
    }

    .dtrg-start > td{
        color: black !important;
    }
</style>
@endsection

@push('scripts')
    <script>
        function deleteModelSub(deleteUrl, tableId, target = ''){
            Swal.fire({
                title: "Warning",
                text: `Yakin menghapus data ${target}? Proses ini tidak dapat diulang kembali`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#169b6b',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Tidak'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url : deleteUrl,
                        dataType : "Json",
                        data : {"_token": "{{ csrf_token() }}"},
                        method : "delete",
                        success:function(data){
                            // console.log(data)
                            if(data.code == 1){
                                Swal.fire(
                                    'Berhasil',
                                    data.message,
                                    'success'
                            )
                            }else{
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Oops...',
                                    text: data.message
                                })
                            }

                            if(data.is_same == false){
                                $('#alertNotSame').removeClass('d-none')
                            }else{
                                $('#alertNotSame').addClass('d-none')
                            }
                            
                            $('#'+tableId).DataTable().ajax.reload();
                        }
                    })
                }
            })
          }
    </script>
    {!! $dataTable->scripts() !!}
@endpush