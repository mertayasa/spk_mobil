<?php

namespace App\Http\Controllers;

use App\DataTables\BookingDataTable;
use App\Http\Requests\BookingStoreRequest;
use App\Http\Requests\BookingUpdateRequest;
use App\Models\Booking;
use App\Models\Mobil;
use App\Models\Sopir;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookingController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('booking.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function datatable(Request $request)
    {
        $booking = Booking::all();

        return BookingDataTable::set($booking);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $user = User::where('level', 2)->where('status_aktif', 1)->pluck('nama', 'id');
        $mobil = Mobil::pluck('nama', 'id');
        $sopir = Sopir::pluck('nama', 'id');

        return view('booking.create', compact('user', 'mobil', 'sopir'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Booking $booking)
    {
        $user = User::where('level', 2)->where('status_aktif', 1)->pluck('nama', 'id');
        $mobil = Mobil::pluck('nama', 'id');
        $sopir = Sopir::pluck('nama', 'id');

        return view('booking.edit', compact('booking', 'user', 'mobil', 'sopir'));
    }

    /**
     * @param \App\Http\Requests\BookingStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookingStoreRequest $request)
    {
        try{
            $data = $request->all();
            $mulai_sewa = Carbon::parse($data['tgl_mulai_sewa']);
            $akhir_sewa = Carbon::parse($data['tgl_akhir_sewa']);
            $durasi_sewa = $akhir_sewa->diffInDays($mulai_sewa);

            $mobil = Mobil::find($data['id_mobil']);
            $data['harga'] = $mobil->harga * $durasi_sewa;

            Booking::create($data);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data booking');
        }

        return redirect()->route('booking.index')->with('success', 'Berhasil menambahkan data booking');
    }

    /**
     * @param \App\Http\Requests\BookingUpdateRequest $request
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function update(BookingUpdateRequest $request, Booking $booking)
    {
        try{
            $data = $request->all();
            $mulai_sewa = Carbon::parse($data['tgl_mulai_sewa']);
            $akhir_sewa = Carbon::parse($data['tgl_akhir_sewa']);
            $durasi_sewa = $akhir_sewa->diffInDays($mulai_sewa);

            $mobil = Mobil::find($data['id_mobil']);
            $data['harga'] = $mobil->harga * $durasi_sewa;

            $booking->update($data);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data booking');
        }

        return redirect()->route('booking.index')->with('success', 'Berhasil menambahkan data booking');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Booking $booking
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Booking $booking)
    {
        try {
            $booking->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data booking']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data booking']);
    }
}
