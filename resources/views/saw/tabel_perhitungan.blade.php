{!! Form::open(['route' => 'saw.update', 'method' => 'patch']) !!}
<table class="table table-hover table-striped" width="100%" id="mobilDatatable">
    <thead>
        <tr>
            <th>No</th>
            <th>Mobil</th>
            @foreach ($kriteria as $krite)
                <th>{{$krite->kriteria}}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @php
            $no = 1;
        @endphp
        @foreach ($mobil as $mob)
            <tr>
                <td>{{$no++}}</td>
                <td>{{$mob->nama}}</td>
                @foreach ($kriteria as $krite)
                    <td>
                        {!! Form::hidden('kriteria_mobil'.$mob->id.'[id_mobil]', $mob->id, []) !!}
                        {!! Form::select('kriteria_mobil'.$mob->id.'[kriteria'.$krite->id.']', $krite->subKriteria->pluck('sub_kriteria', 'skor'), $mob->findKriteriaAndSub($mob->id, $krite->id), ['class' => 'form-control']) !!}
                    </td>
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

<div class="btn-perhitungan p-3">
    {{-- <a href="{{route('saw.index')}}" class="btn btn-danger">Kembali</a> --}}
        <button type="submit" class="btn btn-primary">Update Perhitungan</button>
</div>

{!! Form::close() !!}