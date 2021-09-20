<table class="table table-hover table-striped" width="100%" id="mobilDatatable">
    <thead>
        <tr>
            <th>No</th>
            <th></th>
            <th>Thumbnail</th>
            <th>Nama</th>
            <th>Jenis Mobil</th>
            <th>Jumlah Kursi</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')
    <script>
        let table
        let url = "{{ route('mobil.datatable') }}"

        datatable(url)

        function datatable(url) {

            table = $('#mobilDatatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: url,
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'no',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at',
                        visible: false
                    },
                    {
                        data: 'thumbnail',
                        name: 'thumbnail',
                        orderable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                    },
                    {
                        data: 'jenis_mobil.jenis_mobil',
                        name: 'jenis_mobil.jenis_mobil',
                    },
                    {
                        data: 'jumlah_kursi',
                        name: 'jumlah_kursi'
                    },
                    {
                        data: 'harga',
                        name: 'harga'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                order: [
                    [1, "desc"]
                ],
                columnDefs: [
                    // { width: 300, targets: 1 },
                    {
                        targets: '_all',
                        className: 'align-middle'
                    },
                    {
                        responsivePriority: 1,
                        targets: 1
                    },
                ],
                language: {
                    search: "",
                    searchPlaceholder: "Cari"
                },
            });
        }
    </script>

@endpush
