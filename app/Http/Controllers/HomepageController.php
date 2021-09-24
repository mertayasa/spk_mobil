<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\JenisMobil;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
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

        return view('frontend.welcome', compact('mobil', 'countmobil', 'navJumlahKursi', 'navCategory'));
    }
}
