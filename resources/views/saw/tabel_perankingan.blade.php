<div class="mt-4">
    <table class="table table-hover table-striped" width="100%" id="mobilDatatable">
        <thead>
            <tr>
                <th>No</th>
                <th>Foto Mobil</th>
                <th>Nama Mobil</th>
                <th>Nilai Perankingan</th>
            </tr>
        </thead>
        <tbody>
            @php
                $no = 1;
            @endphp
            @foreach ($hasil_saw as $saw)
                <tr>
                    <td>{{$no++}}</td>
                    <td><img src="{{asset('images/' . $saw->mobil->thumbnail)}}" alt="" width="100px"></td>
                    <td>{{$saw->mobil->nama}}</td>
                    <td>{{$saw->nilai_akhir}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>