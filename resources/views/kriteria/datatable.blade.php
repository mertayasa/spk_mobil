<table class="table table-hover table-striped" width="100%" id="kriteriaDatatable">
    <thead>
        <tr>
            <th>No</th>
            <th></th>
            <th>Kriteria</th>
            <th>Bobot</th>
            <th>Sifat</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')
    <script>
        let table
        let url = "{{ route('kriteria.datatable') }}"

        datatable(url)

        function datatable(url) {

            table = $('#kriteriaDatatable').DataTable({
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
                        data: 'kriteria',
                        name: 'kriteria',
                    },
                    {
                        data: 'bobot',
                        name: 'bobot',
                    },
                    {
                        data: 'sifat',
                        name: 'sifat',
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
