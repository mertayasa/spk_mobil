<div class="row">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('idUser', 'Penyewa ', ['class' => 'mb-1']) !!}
        {!! Form::select('id_user', $user, null, ['class' => 'form-control', 'id' => 'idUser']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('idMobil', 'Mobil', ['class' => 'mb-1']) !!}
        {!! Form::select('id_mobil', $mobil, null, ['class' => 'form-control', 'id' => 'idMobil']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('denganSopir', 'Dengan Sopir', ['class' => 'mb-1']) !!}
        {!! Form::select('status', ['ya', 'tidak'], null, ['class' => 'form-control', 'id' => 'denganSopir']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('idSopir', 'Sopir (Kosongkan Bila Tanpa Sopir)', ['class' => 'mb-1']) !!}
        {!! Form::select('id_sopir', ['' => 'Pilih Sopir'] + $sopir->toArray(), null, ['class' => 'form-control', 'id' => 'idSopir']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('tglMulaiSewa', 'Tanggal Sewa', ['class' => 'mb-1']) !!}
        {!! Form::date('tgl_mulai_sewa', null, ['class' => 'form-control', 'id' => 'tglMulaiSewa']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('tglAkhirSewa', 'Tanggal Kembali', ['class' => 'mb-1']) !!}
        {!! Form::date('tgl_akhir_sewa', null, ['class' => 'form-control', 'id' => 'tglAkhirSewa']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('pengambilan', 'Pengambilan', ['class' => 'mb-1']) !!}
        {!! Form::select('pengambilan', ['ambil_sendiri' => 'Ambil Sendiri', 'diantar' => 'Diantar'], null, ['class' => 'form-control', 'id' => 'pengambilan']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('alamatAntar', 'Alamat Antar (Kosongkan apabila ambil sendiri)', ['class' => 'mb-1']) !!}
        {!! Form::text('alamat_antar', null, ['class' => 'form-control', 'id' => 'alamatAntar']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('bookingStatus', 'Status', ['class' => 'mb-1 text-danger']) !!}
        {!! Form::select('status', getStatusBooking(), Request::is('*edit*') ? $booking->status : null, ['class' => 'form-control is-invalid', 'id' => 'bookingStatus']) !!}
    </div>
</div>

{{-- <hr> --}}

<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('deskripsi', 'Catatan', ['class' => 'mb-1']) !!}
        {!! Form::textarea('deskripsi', null, ['class' => 'form-control', 'id' => 'deskripsi', 'style' => 'height:288px']) !!}
    </div>
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('buktiTrf', 'Bukti Transfer / Pembayaran', ['class' => 'mb-1']) !!}
        {!! Form::file('bukti_trf', ['class' => 'd-block filepond', 'id' => 'buktiTrf']) !!}
    </div>
</div>

@push('scripts')
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

            @if (Request::is('*/create') || (isset($booking) && $booking->bukti_trf == null))
                options = {
                acceptedFileTypes: ['image/png', 'image/jng', 'image/jpeg'],
                maxFileSize: '500KB'
                }
            @else
                imageUrl = "{{ asset('images/' . $booking->bukti_trf) }}"
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
                document.getElementById('buktiTrf'), options
            );
        })
    </script>
@endpush