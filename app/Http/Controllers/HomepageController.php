<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\JenisMobil;
use App\Models\Kriteria;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $kriteria_new = [];

        $kriteria = Kriteria::with('subKriteria')->get();

        // foreach($kriteria as $key => $krite){
        //     $kriteria_new += [$krite->id => $krite->subKriteria->pluck('sub_kriteria', 'id')];
        // }

        // dd($kriteria_new);

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
        
        $mobil = $mobil->paginate(6);

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
}
