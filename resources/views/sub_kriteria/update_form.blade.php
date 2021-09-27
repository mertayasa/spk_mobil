<h5>{{$sub_kriteria->kriteria->kriteria}}</h5>
<div class="row">
    {!! Form::hidden('id_kriteria', $sub_kriteria->id, []) !!}
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('kriteria'.$sub_kriteria->id, 'Sub Kriteria ', ['class' => 'mb-1']) !!}
        {!! Form::text('sub_kriteria', null, ['class' => 'form-control', 'id' => 'kriteria'.$sub_kriteria->id]) !!}
    </div>
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('skor'.$sub_kriteria->id, 'Skor ', ['class' => 'mb-1']) !!}
        {!! Form::number('skor', null, ['class' => 'form-control', 'id' => 'skor'.$sub_kriteria->id]) !!}
    </div>
</div>