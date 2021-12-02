<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="judul-modal" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="judul-modal"></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body py-3 px-5">
                <div class="row align-items-center">
                    <div class="col-12">
                        <h5>Detail Kendaraan</h5>
                    </div>
                    <div class="col-lg-4 col-12">
                        <img src="" id="thumbnail-mobil" alt="">
                    </div>
                    <div class="col-lg-8 col-12">
                        <h4 id="nama-mobil"></h4>
                        <div>
                            <p>Kapasitas mobil : 
                                <span id="capacity-mobil"></span>
                            </p>
                        </div>
                        <div>
                            <p>Harga Mobil per Hari :
                                <B id="harga-mobil"></B>
                            </p>
                        </div>
                        <div>
                            <p>Deskripsi Kendaraan : 
                                <span id="description-mobil"></span>
                            </p>
                        </div>
                    </div>
                    <div class="col-12">
                        <p id="description-mobil"></p>
                    </div>
                    <div class="col-12">
                        <hr>
                    </div>
                    <div class="col-12">
                        <h5>Detail Booking</h5>
                    </div>
                    <div class="col-12">
                        <p> Mobil disewa dari tanggal :
                            <b id="tanggal-mulai-sewa"></b> 
                            sampai 
                            <b id="tanggal-akhir-sewa"></b>
                        </p>
                        <p id="sopir"></p>
                        <p id="diantar"></p>
                        <p class="m-0"> Total Pembayaran
                        </p>
                        <h3 id="total-bayar"></h3>
                    </div>
                    <div class="col-12 d-none bukti-bayar">
                        <a href="" target="_blank">
                            <img class="w-100" src="" alt="">
                        </a>
                        {{-- <a href="{{ asset('images/'.$item->bukti_trf) }}" target="_blank">
                            <img class="w-100" src="{{ asset('images/'.$item->bukti_trf) }}" alt="">
                        </a> --}}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="" class="upload-bayar">Upload Bukti Pembayaran</a>
                <button class="btn-second" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>