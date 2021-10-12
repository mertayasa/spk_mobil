<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Mobil;
use App\Models\JenisMobil;
use App\Models\Kriteria;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Validator;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $start_date = Carbon::now()->addDay(9);
        $end_date = Carbon::now()->addDay(12);

        // dd($request->all());

        // $booking = searchAvailablity($start_date, $end_date, Mobil::all());

        // dd($this->paginate($booking, 2));

        // dd($request->all());

        $validator = Validator::make($request->all(), [
            'end_date' => $request->start_date != null ? 'required' : 'nullable',
            'start_date' => $request->end_date != null ? 'required' : 'nullable'
        ]);

        if ($validator->fails()) {
            dd($validator->getMessageBag());
        }

        $kriteria_new = [];

        $kriteria = Kriteria::with('subKriteria')->get();

        if ($request->session()->has('id_mobil')) {
            $request->session()->forget('id_mobil');
        }

        $category = $request->input('id_category');
        $name = $request->input('id_name');
        $passenger = $request->input('id_passenger');
        $sort = $request->input('id_sort');

        if ($category == 'all') {
            $category = null;
        }
        
        $navJumlahKursi = Mobil::distinct('jumlah_kursi')->pluck('jumlah_kursi', 'jumlah_kursi');
        $navCategory = JenisMobil::has('mobil')->distinct('mobil.id_jenis_mobil')->pluck('jenis_mobil', 'id');

        $mobil = Mobil::with('jenisMobil');

        if (!empty($category)) {
            $mobil->where('id_jenis_mobil', '=', $category);
        }
        if (!empty($name)) {
            $mobil->where('nama', 'like', '%'.$name.'%');
        }
        if (!empty($passenger)) {
            $mobil->where('jumlah_kursi', '>=', $passenger);
        }
        if (!empty($sort)) {
            $mobil->orderby('nama', $sort);
        }

        $countmobil = $mobil->count();

        $init_filtered_mobil = $mobil->get();

        if($request->start_date != null && $request->end_date != null){
            $init_filtered_mobil = searchAvailablity($start_date, $end_date, $mobil->get());
        }

        // dd($mobil->get());
        
        $mobil = $this->paginate($init_filtered_mobil, $_GET['page'] ?? 1, 3, ['path' => route('homepage')]);
        // $mobil = $mobil->paginate(3);
        // dd($mobil);

        return view('frontend.welcome', compact('mobil', 'countmobil', 'navJumlahKursi', 'navCategory', 'kriteria'));
    }

    public function getmobil(Request $request, $data)
    {
        if ($request->ajax()) {
            $mobilnya = Mobil::with('jenisMobil')->where('id', '=', $data)->first();
            return response()->json($mobilnya);
        }

        return redirect()->back();
    }

    public function paginate($items, $page = null, $perPage = 3, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }
}
