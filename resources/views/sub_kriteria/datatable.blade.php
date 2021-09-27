<table class="table table-hover table-striped" width="100%" id="subKriteriaDatatable">
    <thead>
        <tr>
            <th>No</th>
            <th></th>
            <th>Sub Kriteria</th>
            <th>Skor</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')
    <script>
        let table
        let url = "{{ route('sub_kriteria.datatable') }}"

        datatable(url)

        function datatable(url) {

            table = $('#subKriteriaDatatable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                ajax: url,
                columns: [
                    {
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
                        data: 'sub_kriteria',
                        name: 'sub_kriteria',
                    },
                    {
                        data: 'skor',
                        name: 'skor',
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ],
                order: [
                    // [1, "desc"]
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
