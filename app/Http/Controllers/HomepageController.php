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
        $request->validate([
            'end_date' => $request->start_date != null ? 'required' : 'nullable',
            'start_date' => $request->end_date != null ? 'required' : 'nullable'
        ]);

        // if ($validator->fails()) {
        //     dd($validator->getMessageBag());
        // }

        $kriteria_new = [];

        $kriteria = Kriteria::with('subKriteria')->get();

        if ($request->session()->has('id_mobil')) {
            $request->session()->forget('id_mobil');
        }

        $category = $request->input('id_category');
        $name = $request->input('id_name');
        $passenger = $request->input('id_passenger');
        $sort = $request->input('id_sort');
        $start_date = $request->start_date;
        $end_date = $request->end_date;

        // dd(Carbon::parse($start_date)->format('d-m-Y'));

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

        $mobil = $this->paginate($init_filtered_mobil, $_GET['page'] ?? 1, 6, ['path' => route('homepage')]);

        $mobil_slider = Mobil::with('jenisMobil')->get();

        // dd();

        $data = [
            'mobil' => $mobil, 
            'mobil_slider' => $mobil_slider, 
            'countmobil' => $countmobil, 
            'navJumlahKursi' => $navJumlahKursi, 
            'navCategory' => $navCategory, 
            'kriteria' => $kriteria, 
            'request' => $request,
            'start_date' => $start_date != null ? Carbon::parse($start_date)->format('d-m-Y') : null,
            'end_date' => $start_date != null ? Carbon::parse($end_date)->format('d-m-Y') : null,
        ];
        
        return view('frontend.welcome', $data);
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
