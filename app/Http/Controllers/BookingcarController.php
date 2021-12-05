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
    public function index(Mobil $mobil, $start_date = null, $end_date = null)
    {
        $navSopir = Sopir::pluck('nama', 'id');

        $data = [
            'navSopir' => $navSopir, 
            'mobil' => $mobil, 
            'start_date' => $start_date != null ? Carbon::parse($start_date)->format('Y-m-d') : null,
            'end_date' => $start_date != null ? Carbon::parse($end_date)->format('Y-m-d') : null,
        ];  

        return view('frontend.booking', $data);
    }

    public function cek(Request $request)
    {
        if ($request->session()->has('id_mobil')) {

            $mobilreq = $request->session()->get('id_mobil');

            $mobil = Mobil::where('id', $mobilreq)->first();

            $navSopir = Sopir::pluck('nama', 'id');

        } else if ($request->old()) {

            $mobilreq = $request->old('id_mobil');

            $request->session()->put('id_mobil', $mobilreq);
            
            $mobil = Mobil::where('id', $mobilreq)->first();

            $navSopir = Sopir::pluck('nama', 'id');

        } else {
            return redirect()->route('homepage', '#search')->with('info', 'Silahkan pilih dulu mobil yang ingin disewa');
        }

        return view('frontend.booking', compact('navSopir', 'mobil'));
    }

    public function store(BookingcarStoreRequest $request)
    {
        if ($request->session()->has('id_mobil')) {
            $request->session()->forget('id_mobil');
        }

        $data = $request->all();

        $today = Carbon::today();
        $start = Carbon::parse($data['id_date_from']);
        $request->validate([
            'id_date_from' => 'required|date|after_or_equal:'.$today,
            'id_date_to' => 'required|date|after:'.$start->format('d-m-Y')
        ],[
            'id_date_from.after_or_equal' => 'Tanggal Kembali Harus Lebih Dari Atau Sama Dengan Hari Ini',
            'id_date_to.after' => 'Tanggal Kembali Harus 1 Hari Melewati Tanggal Sewa'
        ]);

        // dd('asd');

        try{

            $mulai_sewa = Carbon::parse($data['id_date_from']);
            $akhir_sewa = Carbon::parse($data['id_date_to']);
            $durasi_sewa = $akhir_sewa->diffInDays($mulai_sewa);

            $data['id_dt_from_format'] = $mulai_sewa->format('Y-m-d');
            $data['id_dt_to_format'] = $akhir_sewa->format('Y-m-d');

            empty($data['id_cek_sopir']) ? $data['id_cekSopir'] = 'tidak' : $data['id_cekSopir'] = 'ya';

            empty($data['id_cek_diantar']) ? $data['id_cekDiantar'] = 'ambil_sendiri' : $data['id_cekDiantar'] = 'diantar';
            empty($data['id_cek_diantar']) ? $data['id_alamat_diantar'] = null : '';
            
            $mobil = Mobil::find($data['id_mobil']);

            $check_availablity = searchAvailablity($data['id_dt_from_format'], $data['id_dt_to_format'], [$mobil]);
            // dd($check_availablity);
            if(count($check_availablity) < 1){
                return redirect()->back()->withInput()->with('date_unavailable', 'Mobil tidak tersedia untuk tanggal yang dipilih');
            }

            $data['id_harga'] = $mobil->harga * $durasi_sewa;
            $data['dengan_sopir'] = $data['dengan_sopir'] ?? 'off' == 'on' ? 'ya' : 'tidak';
            $data['pengambilan'] = $data['pengambilan'] ?? 'off' == 'on' ? 'diantar' : 'ambil_sendiri';
            $data['id_alamat'] = $data['pengambilan'] == 'diantar' ? $data['id_alamat'] : '';
            // dd($data['dengan_sopir']);
            $durasi_sewa = $mulai_sewa->diffInDays($akhir_sewa);

            Booking::create([
                'id_mobil' => $data['id_mobil'],
                'id_user' => $data['id_user'],
                'deskripsi' => $data['id_catatan'],
                'dengan_sopir' => $data['dengan_sopir'],
                'pengambilan' => $data['pengambilan'],
                'alamat_antar' => $data['id_alamat_diantar'],
                'harga' => $data['id_harga'],
                'tgl_mulai_sewa' => $data['id_dt_from_format'],
                'tgl_akhir_sewa' => $data['id_dt_to_format'],
                'biaya_sopir' => $data['dengan_sopir'] == 'ya' ? $durasi_sewa * 150000 : 0
            ]);

        } catch(Exception $e) {
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data booking');
        }

        return redirect()->route('cart.index')->with('success', 'Data Booking anda sudah kami terima');
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
            return redirect()->route('cart.index')->with('info', 'Mohon pilih mobil yang ingin diedit');
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
            return redirect()->route('cart.index')->with('error', 'Gagal mengubah data booking');
        }

        return redirect()->route('cart.index')->with('success', 'Berhasil mengubah data booking');
    }

    public function cart(Request $request)
    {
        if ($request->session()->has('id_mobil')) {
            $request->session()->forget('id_mobil');
        }

        if (!Auth::check()) {
            return redirect()->route('login')->with('info', 'Silahkan login terlebih dahulu');
        }

        $booking = Booking::where([
                        ['id_user', '=', Auth::user()->id],
                        // ['status', '=', 'booking_baru']
                    ])->latest()->get();

        // if ($booking->isEmpty()) {
        //     return redirect()->route('homepage', '#search')->with('error', 'Cart Kosong, Mohon Booking salah satu mobil');
        // }

        return view('frontend.cart-book', compact('booking'));
    }

    public function checkAvailable(Mobil $mobil, $start_date, $end_date){
        
        try{
            $parsed_start = Carbon::parse($start_date)->format('d-m-Y');
            $parsed_end = Carbon::parse($end_date)->format('d-m-Y');

            $durasi_sewa = Carbon::parse($start_date)->diffInDays(Carbon::parse($end_date));
            $harga_sewa = $mobil->harga * $durasi_sewa;

            $check_available = searchAvailablity($parsed_start, $parsed_end, [$mobil]);
    
            if(count($check_available) > 0){
                return response(['code' => 1, 'message' => "Mobil tersedia untuk tanggal ${start_date} sampai ${end_date}", 'harga_sewa' => formatPrice($harga_sewa)]);
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
        // dd('asdsa');
        if (Auth::user()->id != $booking->user->id) {
            return redirect()->route('cart.index')->with('error', 'Jangan macem-macem bro');
        }

        if (!empty($booking->bukti_trf)) {
            return redirect()->route('cart.index')->with('info', 'Bukti Pembayaran Anda sudah kami terima');
        }

        return view('frontend.bukti-bayar', compact('booking'));
    }

    public function kirimBukti(Request $request, Booking $booking)
    {
        try{
            $data = $request->all();

            $now = Carbon::now();
            // dd($now->diffInHours($booking->created_at));
            if($now->diffInHours($booking->created_at)){
                $booking->status = 'expired';
                $booking->save();
                return redirect()->back()->with('error', 'Batas waktu pembayaran sudah lebih dari 24jam');
            }

            $base_64_foto = json_decode($request['bukti_trf'], true);
            $upload_image = uploadFile($base_64_foto, 'bukti_trf');
            if ($upload_image === 0) {
                return redirect()->back()->withInput()->with('error', 'Mohon mengisi bukti pembayaran !');
            }
    
            $data['bukti_trf'] = $upload_image;

            $booking->update($data);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal mengirim bukti pembayaran');
        }

        return redirect()->route('cart.index')->with('success', 'Berhasil mengirim bukti pembayaran');
    }

    public function getBooking(Request $request, $data)
    {
        if ($request->ajax()) {
            $bookingnya = Booking::where('id', $data)->first();
            return response()->json($bookingnya);
        }

        return redirect()->back();
    }
}
