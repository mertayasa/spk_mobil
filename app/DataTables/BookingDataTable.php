<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Yajra\DataTables\DataTables;

class BookingDataTable
{
    static public function set($booking)
    {
        return Datatables::of($booking)
            ->editColumn('harga', function($booking){
                return formatPrice($booking->harga);
            })

            ->editColumn('tgl_mulai_sewa', function($booking){
                return indonesianDate($booking->tgl_mulai_sewa);
            })

            ->editColumn('tgl_akhir_sewa', function($booking){
                return indonesianDate($booking->tgl_akhir_sewa);
            })

            ->addColumn('action', function ($booking) {
                $deleteUrl = "'" . route('booking.destroy', $booking->id) . "', 'bookingDatatable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('booking.edit', $booking->id) . '" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" ><i class="menu-icon fa fa-pencil-alt"></i></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus"><i class="menu-icon fa fa-trash"></i></a>' .
                    '</div>';
            })->addIndexColumn()->rawColumns(['action'])->make(true);
    }
}
