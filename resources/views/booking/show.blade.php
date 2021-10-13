@extends('layouts.app')

@section('content')
<section class="section pt-0">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header d-flex justify-content-between">
            <h4>INVOICE</h4>
          </div>
          <div class="card-body" id="parrentForm">
            
            <div class="row px-0">
                <div class="col-12 col-md-6">
                    <h6> <b> Ditagih Kepada : </b> </h6>
                    <p class="mb-0">{{strtoupper($booking->user->nama)}}</p>
                    <p class="mb-0">{{$booking->user->telpon ?? '<i>Tanpa nomor hp</i>'}}</p>
                    <p class="mb-0">{{$booking->user->alamat ?? '<i>Tanpa alamat</i>'}}</p>

                    {{-- <h6 class="mt-3">Jenis Laundry : </h6>
                    {{strtoupper(getLaundryType($booking->type))}} --}}
                </div>
                
                <div class="col-12 col-md-6 mt-3 mt-md-0">
                    {{-- <h6>Tanggal Sewa : </h6>
                    {{indonesianDate($booking->tgl_mulai_sewa)}} --}}

                    <h6 class="mt-0 mb-0"> <b> Sopir : </b> </h6>
                    {!! $booking->sopir->nama ?? '<span class="text-danger">Tanpa Sopir</span>' !!}

                    <h6 class="mt-3 mb-0"> <b> Catatan : </b> </h6>
                    {{$booking->deskripsi ?? '-'}}
                </div>

                <div class="col-12">
                    <hr>

                    <h6 class="mt-3">Detail Pembayaran : </h6>
                    
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Mobil</th>
                                <th scope="col">Tanggal Sewa</th>
                                <th scope="col">Tanggal Kembali</th>
                                <th scope="col">Harga Sewa</th>
                                {{-- <th scope="col" class="text-right">Subtotal</th> --}}
                                </tr>
                            </thead>
                            @php
                                $no = 1;
                            @endphp
                            <tbody>
                                {{-- @foreach ($booking->order_detail as $booking_detail) --}}
                                    <tr>
                                        <th scope="row">{{$no++}}</th>
                                        <td>{{$booking->mobil->nama}}</td>
                                        <td>{{indonesianDate($booking->tgl_mulai_sewa)}}</td>
                                        <td>{{indonesianDate($booking->tgl_akhir_sewa)}}</td>
                                        <td>{{formatPrice($booking->harga)}} </td>
                                        {{-- <td class="text-right" >{{formatPrice($booking->item_count * $booking->package_price)}}</td> --}}
                                    </tr>
                                {{-- @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                    
                    {{-- <div class="row justify-content-between">
                        <div class="col-12 col-md-6 px-0">
                        </div>
                        <div class="col-12 col-md-6 col-lg-4">
                            <table align="right" class="mt-3 col-12 px-3">
                                <tr>
                                    <td class="text-left">Biaya laundry</td>
                                    <td style="width: 30px; text-align:center"> : </td>
                                    <td class="text-right pr-3"><span id="laundryPrice">{{formatPrice($booking->laundry_price)}}</span></td>
                                </tr>
                                <tr>
                                    <td class="text-left">Diskon</td>
                                    <td style="width: 30px; text-align:center"> : </td>
                                    <td class="text-right pr-3"><span id="dicountTotal">{{isset($booking->discount) ? formatPrice($booking->discount) : 'Rp 0'}}</span></td>
                                </tr>
                                <tr>
                                    <td class="text-left">Biaya tambahan</td>
                                    <td style="width: 30px; text-align:center"> : </td>
                                    <td class="text-right pr-3"><span id="additionalCharge">{{isset($booking->additional_charge) ? formatPrice($booking->additional_charge) : 'Rp 0'}}</span></td>
                                </tr>
                    
                                <tr class="border-top">
                                    <td class="text-left" style="font-weight: bold">Total biaya laundry</td>
                                    <td style="width: 30px; text-align:center; font-weight: bold"> : </td>
                                    <td style="font-weight: bold" class="text-right pr-3"><span id="laundryTotalPrice">{{formatPrice($booking->payment_total)}}</span></td>
                                </tr>
                            </table>
                        </div>
                    </div> --}}
                </div>
                <div class="col-12">
                    <a href="{{route('booking.index')}}" class="btn btn-secondary mt-5 mr-3">Kembali</a>
                    <a href="{{route('booking.edit', $booking->id)}}" class="btn btn-warning mt-5"> Edit </a>
                    
                    {{-- @if(checkUserLevel() == 2)
                        <a href="{{route('review.index')}}" class="btn btn-warning mt-5">Beri Ulasan <i class="fas fa-star"></i> </a>
                    @else
                        @if ($booking->progress < 3)
                            <a href="{{route('order.edit', $booking->id)}}" class="btn btn-warning mt-5 mr-3">Ubah Order <i class="menu-icon fa fa-pencil-alt"></i> </a>
                        @endif
                    @endif --}}
                </div>
            </div>


          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
