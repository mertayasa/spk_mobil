<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="judul-modal" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judul-modal"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body py-3 px-5">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-12">
                        <img src="" id="thumbnail-mobil" alt="">
                    </div>
                    <div class="col-lg-7 col-12">
                        <h4 id="nama-mobil"></h4>
                        <div>
                            <strong>Jenis Mobil : </strong>
                            <span id="jenis-mobil"></span>
                        </div>
                        <div>
                            <strong>Harga / Hari :</strong>
                            <span id="harga-mobil"></span>
                        </div>
                        <div>
                            <strong>Jumlah Kursi : </strong>
                            <span id="capacity-mobil"></span>
                        </div>
                    </div>
                    <div class="col-12">
                        <p id="description-mobil"></p>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Tutup</button> --}}
                <button class="btn-second" data-dismiss="modal">Tutup</button>
                {{-- <form action="{{ route('bookingcar.index') }}" method="post">
                    @csrf
                    <button name="id_mobil" id="id-mobil" type="submit" value="" class="btn-first btn-sm btn-submit">Booking Sekarang</button>
                </form> --}}
                {{-- <a href="{{ route('bookingcar.index', $item->id) }} class="btn-first btn-submit">Booking</a> --}}
            </div>
        </div>
    </div>
</div>