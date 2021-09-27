@foreach ($kriteria as $krite)
    <h5>{{$krite->kriteria}}</h5>
    <div class="row">
        {!! Form::hidden('sub_kriteria'. $krite->id .'[id_kriteria]', $krite->id, []) !!}
        <div class="col-12 col-md-6 pb-3 pb-md-0">
            {!! Form::label('kriteria'.$krite->id, 'Sub Kriteria ', ['class' => 'mb-1']) !!}
            {!! Form::text('sub_kriteria'. $krite->id .'[sub_kriteria]', null, ['class' => 'form-control', 'id' => 'kriteria'.$krite->id]) !!}
        </div>
        <div class="col-12 col-md-6 pb-3 pb-md-0">
            {!! Form::label('skor'.$krite->id, 'Skor ', ['class' => 'mb-1']) !!}
            {!! Form::number('sub_kriteria'. $krite->id .'[skor]', null, ['class' => 'form-control', 'id' => 'skor'.$krite->id]) !!}
        </div>
    </div>
    <hr>
    <span class="pb-3"></span>
@endforeach