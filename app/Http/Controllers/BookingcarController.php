<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Mobil;
use App\Models\Sopir;
use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\BookingcarStoreRequest;
use App\Http\Requests\BookingcarUpdateRequest;

class BookingcarController extends Controller
{
    public function index(Request $request)
    {
        $mobilreq = $request->input('id_mobil');

        $mobil = Mobil::where('id', $mobilreq)->first();

        $navSopir = Sopir::pluck('nama', 'id');

        return view('frontend.booking', compact('navSopir', 'mobil'));
    }

    public function cek(Request $request)
    {
        if ($request->session()->has('id_mobil')) {

            $mobilreq = $request->session()->get('id_mobil');

            $mobil = Mobil::where('id', $mobilreq)->first();

            $navSopir = Sopir::pluck('nama', 'id');

            return view('frontend.booking', compact('navSopir', 'mobil'));

        } else if ($request->old()) {

            $mobilreq = $request->old('id_mobil');

            $request->session()->put('id_mobil', $mobilreq);
            
            $mobil = Mobil::where('id', $mobilreq)->first();

            $navSopir = Sopir::pluck('nama', 'id');

            return view('frontend.booking', compact('navSopir', 'mobil'));

        } else {

            return redirect()->route('homepage', '#search')->with('info', 'Silahkan pilih dulu mobil yang ingin disewa');

        }
    }

    public function store(BookingcarStoreRequest $request)
    {

        if ($request->session()->has('id_mobil')) {
            $request->session()->forget('id_mobil');
        }

        try{
            $data = $request->all();
            $mulai_sewa = Carbon::parse($data['id_date_from']);
            $akhir_sewa = Carbon::parse($data['id_date_to']);
            $durasi_sewa = $akhir_sewa->diffInDays($mulai_sewa);

            $data['id_dt_from_format'] = $mulai_sewa->format('Y-m-d');
            $data['id_dt_to_format'] = $akhir_sewa->format('Y-m-d');

            
            $mobil = Mobil::find($data['id_mobil']);

            $check_availablity = searchAvailablity($data['id_dt_from_format'], $data['id_dt_to_format'], [$mobil]);
            if(count($check_availablity) < 1){
                return redirect()->back()->withInput()->with('date_unavailable', 'Mobil tidak tersedia untuk tanggal yang dipilih');
            }

            $data['id_harga'] = $mobil->harga * $durasi_sewa;

            Booking::create([
                'id_mobil' => $data['id_mobil'],
                'id_user' => $data['id_user'],
                // 'id_sopir' => $data['id_driver'],
                'deskripsi' => $data['id_catatan'],
                'harga' => $data['id_harga'],
                'tgl_mulai_sewa' => $data['id_dt_from_format'],
                'tgl_akhir_sewa' => $data['id_dt_to_format']
            ]);

        } catch(Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data booking');
        }

        return redirect()->route('bookingcar.cart')->with('success', 'Data Booking anda sudah kami terima');
    }

    public function editForm(Request $request, $data)
    {
        if ($request->session()->has('id_mobil')) {
            $request->session()->forget('id_mobil');
        }

        if (!Auth::check()) {
            return redirect()->route('login')->with('info', 'Silahkan login terlebih dahulu');
        }
        $booking = Booking::with('user', 'mobil', 'sopir')
                    ->where([
                        ['id_user', '=', Auth::user()->id],
                        ['status', '=', 'booking_baru']
                    ]);
        $bookingWhere = $booking->where('id', '=', $data)->first();
        if (empty($bookingWhere)) {
            return redirect()->route('bookingcar.cart')->with('info', 'Mohon pilih mobil yang ingin diedit');
        }
        // dd($bookingWhere->mobil->thumbnail);
        $navSopir = Sopir::pluck('nama', 'id');
        return view('frontend.booking-edit', compact('bookingWhere', 'navSopir'));
    }

    public function edit(BookingcarUpdateRequest $request)
    {
        if ($request->session()->has('id_mobil')) {
            $request->session()->forget('id_mobil');
        }
        try{
            $data = $request->all();
            $mulai_sewa = Carbon::parse($data['id_date_from']);
            $akhir_sewa = Carbon::parse($data['id_date_to']);
            $durasi_sewa = $akhir_sewa->diffInDays($mulai_sewa);

            $data['id_dt_from_format'] = $mulai_sewa->format('Y-m-d');
            $data['id_dt_to_format'] = $akhir_sewa->format('Y-m-d');

            $booking = Booking::with('mobil')->where('id', '=', $request['id-booking']);

            $mobil = $booking->first();
            $data['id_harga'] = $mobil->mobil->harga * $durasi_sewa;

            $booking->update([
                'id_sopir' => $data['id_driver'],
                'deskripsi' => $data['id_catatan'],
                'harga' => $data['id_harga'],
                'tgl_mulai_sewa' => $data['id_dt_from_format'],
                'tgl_akhir_sewa' => $data['id_dt_to_format']
            ]);
        }catch(Exception $e){
            dd($data);
            Log::info($e->getMessage());
            return redirect()->route('bookingcar.cart')->with('error', 'Gagal mengubah data booking');
        }

        return redirect()->route('bookingcar.cart')->with('success', 'Berhasil mengubah data booking');
    }

    public function cart(Request $request)
    {
        if ($request->session()->has('id_mobil')) {
            $request->session()->forget('id_mobil');
        }

        if (!Auth::check()) {
            return redirect()->route('login')->with('info', 'Silahkan login terlebih dahulu');
        }
        $booking = Booking::with('user', 'mobil', 'sopir')
                    ->where([
                        ['id_user', '=', Auth::user()->id],
                        ['status', '=', 'booking_baru']
                    ])->latest()->get();

        if ($booking->isEmpty()) {
            return redirect()->route('homepage', '#search')->with('error', 'Cart Kosong, Mohon Booking salah satu mobil');
        }
        return view('frontend.cart-book', compact('booking'));
    }

    public function checkAvailable(Mobil $mobil, $start_date, $end_date){
        
        try{
            $parsed_start = Carbon::parse($start_date)->format('d-m-Y');
            $parsed_end = Carbon::parse($end_date)->format('d-m-Y');
            $check_available = searchAvailablity($parsed_start, $parsed_end, [$mobil]);
    
            if(count($check_available) > 0){
                return response(['code' => 1, 'message' => "Mobil tersedia untuk tanggal ${start_date} sampai ${end_date}"]);
            }else{
                return response(['code' => 0, 'message' => "Mobil tidak tersedia untuk tanggal ${start_date} sampai ${end_date}"]);
            }
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal mendapatkan informasi ketersediaan mobil']);
        }
    }

    public function uploadBukti(Booking $booking)
    {
        dd($booking);
    }

}
