<table class="table table-hover table-striped" width="100%" id="jenisMobilDatatable">
    <thead>
        <tr>
            <th>No</th>
            <th></th>
            <th>Jenis Mobil</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')
    <script>
        let table
        let url = "{{ route('jenis_mobil.datatable') }}"

        datatable(url)

        function datatable(url) {

            table = $('#jenisMobilDatatable').DataTable({
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
                        data: 'jenis_mobil',
                        name: 'jenis_mobil',
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
