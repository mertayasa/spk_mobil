<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Mobil;
use App\Models\Sopir;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dashboard_data = $this->getDashboardData();
        // dd($dashboard_data);
        return view('dashboard.index', compact('dashboard_data'));
    }

    public function getDashboardData()
    {
        $mobil = Mobil::all();
        $pelanggan = User::where('level', 2)->get();
        $sopir = Sopir::all();
        $booking = Booking::all();
        $pemasukan = $booking->where('status', 'selesai')->sum('harga');

        $data = [
            'mobil_count' => $mobil->count(),
            'pelanggan_count' => $pelanggan->count(),
            'sopir_count' => $sopir->count(),
            'booking_count' => $booking->count(),
            'booking_ongoing' => $booking->where('status', '!=', 'selesai')->count(),
            'booking_baru' => $booking->where('status', 'booking_baru')->count(),
            'booking_selesai' => $booking->where('status', 'selesai')->count(),
            'pemasukan' => $pemasukan,
        ];

        return $data;

        // dd($data);
    }
}
