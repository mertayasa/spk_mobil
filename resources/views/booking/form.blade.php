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
        {!! Form::label('idSopir', 'Sopir', ['class' => 'mb-1']) !!}
        {!! Form::select('id_sopir', ['' => 'Pilih Sopir'] + $sopir->toArray(), null, ['class' => 'form-control', 'id' => 'idSopir']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('bookingStatus', 'Status', ['class' => 'mb-1 text-danger']) !!}
        {!! Form::select('status', getStatusBooking(), Request::is('*edit*') ? $booking->status : null, ['class' => 'form-control is-invalid', 'id' => 'bookingStatus']) !!}
    </div>
</div>
<hr>
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
        {!! Form::label('deskripsi', 'Catatan', ['class' => 'mb-1']) !!}
        {!! Form::textarea('deskripsi', null, ['class' => 'form-control', 'id' => 'deskripsi', 'style' => 'height:148px']) !!}
    </div>
</div>