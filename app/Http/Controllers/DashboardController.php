<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Mobil;
use App\Models\Sopir;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $booking = $this->getBookingChart($request);
        // dd($booking);
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
            'booking_terkini' => Booking::latest()->limit(5)->get(),
        ];

        return $data;

    }


    public function getBookingChart(Request $request)
    {
        $year = $request->year != 'now' ? $request->year : Carbon::now()->year;
        // $year = Carbon::now()->year;
        $months = ['January',  'February',  'March',  'April',  'May',  'June',  'July',  'August',  'September',  'October',  'November',  'December'];
        $data_booking = Booking::where('status', 'selesai')->selectRaw('year(created_at) year, monthname(created_at) month, sum(harga) data')
            ->whereYear('created_at', $year)
            ->groupBy('year', 'month')
            ->orderBy('month', 'DESC')
            ->get()->toArray();
            
        $booking = [];

        foreach ($months as $key => $month) {
            $key = array_search($month, array_column($data_booking, 'month'));
            $data = $key === false ? 0 : $data_booking[$key]['data'];
            array_push($booking, $data);
        }

        return response(['code' => 1, 'booking' => $booking]);
    }
}
