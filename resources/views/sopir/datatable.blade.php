<table class="table table-hover table-striped" width="100%" id="sopirDatatable">
    <thead>
        <tr>
            <th>No</th>
            <th></th>
            <th>Photo</th>
            <th>Nama</th>
            <th>Telpon</th>
            <th>No KTP</th>
            <th>Alamat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')
    <script>
        let table
        let url = "{{ route('sopir.datatable') }}"

        datatable(url)

        function datatable(url) {

            table = $('#sopirDatatable').DataTable({
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
                        data: 'photo',
                        name: 'photo',
                        orderable: false
                    },
                    {
                        data: 'nama',
                        name: 'nama',
                    },
                    {
                        data: 'telpon',
                        name: 'telpon',
                    },
                    {
                        data: 'no_ktp',
                        name: 'no_ktp'
                    },
                    {
                        data: 'alamat',
                        name: 'alamat'
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
                        targets: 7
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
