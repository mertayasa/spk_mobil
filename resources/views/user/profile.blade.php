<div class="row">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('namaUser', 'Nama', ['class' => 'mb-1']) !!}
        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'namaUser']) !!}
    </div>
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('telponUser', 'Telpon', ['class' => 'mb-1']) !!}
        {!! Form::text('telpon', null, ['class' => 'form-control', 'id' => 'telponUser']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('noKtpUser', 'No KTP', ['class' => 'mb-1']) !!}
        {!! Form::number('no_ktp', null, ['class' => 'form-control', 'id' => 'noKtpUser']) !!}
    </div>
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('kelaminUser', 'Pekerjaan', ['class' => 'mb-1']) !!}
        {!! Form::select('kelamin', [0 => 'Laki-Laki', 1 => 'Perempuan'], null, ['class' => 'form-control', 'id' => 'kelaminUser']) !!}
    </div>
</div>

<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('tempatLahir', 'Tempat Lahir', ['class' => 'mb-1']) !!}
        {!! Form::text('tempat_lahir', null, ['class' => 'form-control', 'id' => 'tempatLahir']) !!}
    </div>
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('tglLahirUser', 'Tanggal Lahir', ['class' => 'mb-1']) !!}
        {!! Form::date('tanggal_lahir', null, ['class' => 'form-control', 'id' => 'tglLahirUser']) !!}
    </div>
</div>

<div class="row mt-3">
    @if (!$hide_level)
        <div class="col-12 col-md-6">
            {!! Form::label('levelUser', 'Level User', ['class' => 'mb-1']) !!}
            {!! Form::select('level', $level, null, ['class' => 'form-control', 'id' => 'levelUser']) !!}
        </div>
    @endif
    <div class="col-12 col-md-6">
        {!! Form::label('alamatUser', 'Alamat', ['class' => 'mb-1']) !!}
        {!! Form::textarea('alamat', null, ['class' => 'form-control', 'id' => 'alamatUser', 'style' => 'height:150px']) !!}
    </div>
</div>

<h6 class="text-primary text-bold mt-4 mt-md-5">Authentikasi</h6>
<small><sup>*</sup> <i>Mohon untuk mencatat Email dan Password yang akan digunakan pada saat login</i></small><br>
<div class="row mt-3">
 <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('userEmail', 'Email', ['class' => 'mb-1']) !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'userEmail']) !!}
    </div>
</div>
<div class="row mb-5 mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('userPassword', 'Password', ['class' => 'mb-1']) !!}
        {!! Form::password('password', ['class' => 'form-control', 'id' => 'userPassword']) !!}
    </div>
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('userConfirmPassword', 'Konfirmasi Password', ['class' => 'mb-1']) !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'userConfirmPassword']) !!}
    </div>
</div>