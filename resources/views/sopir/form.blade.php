<div class="row">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('photoSopir', 'Photo', ['class' => 'mb-1']) !!}
        {!! Form::file('photo', ['class' => 'd-block filepond', 'id' => 'photoSopir']) !!}
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('namaSopir', 'Nama ', ['class' => 'mb-1']) !!}
        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'namaSopir']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('telponSopir', 'Telpon', ['class' => 'mb-1']) !!}
        {!! Form::number('telpon', null, ['class' => 'form-control', 'id' => 'telponSopir']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('tempatLahirSopir', 'Tempat Lahir', ['class' => 'mb-1']) !!}
        {!! Form::text('tempat_lahir', null, ['class' => 'form-control', 'id' => 'tempatLahirSopir']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('tanggalLahirSopir', 'Tanggal Lahir', ['class' => 'mb-1']) !!}
        {!! Form::date('tanggal_lahir', null, ['class' => 'form-control', 'id' => 'tanggalLahirSopir']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('noKtpSopir', 'No KTP', ['class' => 'mb-1']) !!}
        {!! Form::number('no_ktp', null, ['class' => 'form-control', 'id' => 'noKtpSopir']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('alamatMobil', 'Alamat', ['class' => 'mb-1']) !!}
        {!! Form::textarea('alamat', null, ['class' => 'form-control', 'id' => 'alamatMobil', 'style' => 'height:148px']) !!}
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
                imageUrl = "{{ asset('images/uploaded/' . $sopir->photo) }}"
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
                document.getElementById('photoSopir'), options
            );
        })
    </script>
@endpush
