<table class="table table-hover table-striped" width="100%" id="bookingDatatable">
    <thead>
        <tr>
            <th>No</th>
            <th></th>
            <th>Mobil</th>
            <th>Penyewa</th>
            <th>Status</th>
            <th>Dengan Sopir</th>
            <th>Sopir</th>
            <th>Pengambilan</th>
            <th>Harga</th>
            <th>Tanggal Sewa</th>
            <th>Tanggal Kembali</th>
            <th>Alamat Pengambilan</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody></tbody>
</table>

@push('scripts')
    <script>
        let table
        let url = "{{ route('booking.datatable') }}"

        datatable(url)

        function datatable(url) {

            table = $('#bookingDatatable').DataTable({
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
                        data: 'mobil.nama',
                        name: 'mobil.nama',
                    },
                    {
                        data: 'user.nama',
                        name: 'user.nama',
                    },
                    {
                        data: 'status',
                        name: 'status',
                    },
                    {
                        data: 'dengan_sopir',
                        name: 'dengan_sopir',
                    },
                    {
                        data: 'nama_sopir',
                        name: 'nama_sopir',
                    },
                    {
                        data: 'pengambilan',
                        name: 'pengambilan',
                    },
                    {
                        data: 'harga',
                        name: 'harga'
                    },
                    {
                        data: 'tgl_mulai_sewa',
                        name: 'tgl_mulai_sewa'
                    },
                    {
                        data: 'tgl_akhir_sewa',
                        name: 'tgl_akhir_sewa'
                    },
                    {
                        data: 'alamat_antar',
                        name: 'alamat_antar'
                    },
                    {
                        data: 'deskripsi',
                        name: 'deskripsi'
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
                        targets: 13
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
