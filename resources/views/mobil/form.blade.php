<div class="row">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('thumbnailMobil', 'Thumbnail', ['class' => 'mb-1']) !!}
        {!! Form::file('thumbnail', ['class' => 'd-block filepond', 'id' => 'thumbnailMobil']) !!}
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('namaMobil', 'Nama ', ['class' => 'mb-1']) !!}
        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'namaMobil']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('jumlahKursi', 'Jumlah Kursi', ['class' => 'mb-1']) !!}
        {!! Form::number('jumlah_kursi', null, ['class' => 'form-control', 'id' => 'jumlahKursi']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('hargaMobil', 'Harga Sewa (Rp. /hari)', ['class' => 'mb-1']) !!}
        {!! Form::number('harga', null, ['class' => 'form-control', 'id' => 'hargaMobil']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('hargaMobil', 'Jenis Mobil', ['class' => 'mb-1']) !!}
        {!! Form::select('id_jenis_mobil', $jenis_mobil, null, ['class' => 'form-control']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('deskripsiMobil', 'Deskripsi', ['class' => 'mb-1']) !!}
        {!! Form::textarea('deskripsi', null, ['class' => 'form-control', 'id' => 'deskripsiMobil', 'style' => 'height:148px']) !!}
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

            @if (Request::is('*/create'))
                options = {
                acceptedFileTypes: ['image/png', 'image/jng', 'image/jpeg'],
                maxFileSize: '500KB'
                }
            @else
                imageUrl = "{{ asset('images/uploaded/' . $mobil->thumbnail) }}"
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
                document.getElementById('thumbnailMobil'), options
            );
        })
    </script>
@endpush
