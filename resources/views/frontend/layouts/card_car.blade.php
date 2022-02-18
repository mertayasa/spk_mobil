<div class="car-grid-wrapper car-grid bx-wrapper">
    <div class="image-sec animate-img">
        <a href="#">
            <img src="{{ asset('images/' . $item->thumbnail) }}" class="full-width" alt="img">
        </a>
    </div>
    @if (!isset($hide_name_price_description))
        <div class="car-grid-caption padding-20 bg-custom-white p-relative">
            <h4 class="title fs-16">
                <a href="#" class="text-custom-black ">
                    {{ $item->nama }}
                </a>
            </h4>
            <small class="text-light-dark mt-3">Per Hari</small>
            @if (!isset($hide_description))
                <span class="mt-3 js-harga harga-{{ $index }} price price-tag text-danger" style="font-size:1.2rem"> <b> {{ formatPrice($item->harga) }} </b> </span>
                <p>{{ $item->jenisMobil->jenis_mobil }}</p>
                <p>{{ $item->deskripsi }}</p>
                <div class="action d-flex justify-content-between">
                    <a class="btn-second btn-small mobil-view-ajax" href="#" data-id="{{ $item->id }}" data-toggle="modal" data-target="#exampleModal">Detail</a>
                    {{-- <form action="{{ route('bookingcar.index') }}" method="post">
                        @csrf
                        <button name="id_mobil" type="submit" value="{{ $item->id }}" class="btn-first btn-submit">Booking</button>
                    </form> --}}
                    <a href="{{ route('bookingcar.index', [$item->id, $start_date ?? null, $end_date ?? null]) }}" class="btn-first btn-submit w-50 p-0">Booking</a>
                </div>
            @else
                <span class="mt-3 js-harga harga-{{ $index ?? '0' }} price price-tag">{{ formatPrice($item->harga) }}</span>
            @endif
        </div>
    @else

    @endif
</div>