<div class="row">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('kriteria', 'Kriteria ', ['class' => 'mb-1']) !!}
        {!! Form::text('kriteria', null, ['class' => 'form-control', 'id' => 'kriteria']) !!}
    </div>
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('bobot', 'Bobot ', ['class' => 'mb-1']) !!}
        {!! Form::text('bobot', null, ['class' => 'form-control', 'id' => 'bobot']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('sifat', 'Sifat ', ['class' => 'mb-1']) !!}
        {!! Form::select('sifat', ['benefit' => 'Benefit', 'cost' => 'Cost'], null, ['class' => 'form-control', 'id' => 'sifat']) !!}
    </div>
</div>