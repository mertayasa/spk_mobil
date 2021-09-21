<div class="row">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('photoUser', 'Photo', ['class' => 'mb-1']) !!}
        {!! Form::file('photo', ['class' => 'd-block filepond', 'id' => 'photoUser']) !!}
    </div>
</div>

<div class="row">
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('namaUser', 'Nama ', ['class' => 'mb-1']) !!}
        {!! Form::text('nama', null, ['class' => 'form-control', 'id' => 'namaUser']) !!}
    </div>
    <div class="col-12 col-md-6 pb-3 pb-md-0">
        {!! Form::label('emailUser', 'Email ', ['class' => 'mb-1']) !!}
        {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'emailUser']) !!}
    </div>
</div>
<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('telponUser', 'Telpon', ['class' => 'mb-1']) !!}
        {!! Form::number('telpon', null, ['class' => 'form-control', 'id' => 'telponUser']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('noKtpUser', 'No KTP', ['class' => 'mb-1']) !!}
        {!! Form::number('no_ktp', null, ['class' => 'form-control', 'id' => 'noKtpUser']) !!}
    </div>
</div>
<div class="row mt-3">
    @if (Request::is('*edit*'))
        <div class="col-12 col-md-6">
            {!! Form::label('statusUser', 'Status Aktif', ['class' => 'mb-1']) !!}
            {!! Form::select('status_aktif', [0 => 'Tidak Aktif', 1 => 'Aktif'], $user->status_aktif, ['class' => 'form-control', 'id' => 'statusUser']) !!}
        </div>
    @endif
    
    <div class="col-12 col-md-6">
        {!! Form::label('kelaminUser', 'Jenis Kelamain', ['class' => 'mb-1']) !!}
        {!! Form::select('jenis_kelamin', [0 => 'Laki-Laki', 1 => 'Perempuan'], null, ['class' => 'form-control', 'id' => 'kelaminUser']) !!}
    </div>

    <div class="col-12 col-md-6">
        {!! Form::label('alamatUser', 'Alamat', ['class' => 'mb-1']) !!}
        {!! Form::textarea('alamat', null, ['class' => 'form-control', 'id' => 'alamatUser', 'style' => 'height:148px']) !!}
    </div>
</div>

<hr>

<div class="row mt-3">
    <div class="col-12 col-md-6">
        {!! Form::label('passwordUser', 'Password', ['class' => 'mb-1']) !!}
        {!! Form::password('password', ['class' => 'form-control', 'id' => 'passwordUser']) !!}
    </div>
    <div class="col-12 col-md-6">
        {!! Form::label('passwordConfirmUser', 'Konfirmasi Password', ['class' => 'mb-1']) !!}
        {!! Form::password('password_confirmation', ['class' => 'form-control', 'id' => 'passwordConfirmUser']) !!}
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
                imageUrl = "{{ asset('images/uploaded/' . $user->photo) }}"
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
                document.getElementById('photoUser'), options
            );
        })
    </script>
@endpush
