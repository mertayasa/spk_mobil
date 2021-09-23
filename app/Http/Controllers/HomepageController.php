<?php

namespace App\Http\Controllers;

use App\Models\Mobil;
use App\Models\JenisMobil;
use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->input('category', null);
        $name = $request->input('name');
        $passenger = $request->input('passenger', 1);

        $mobil = Mobil::with('jenisMobil')->get();

        $navJumlahKursi = Mobil::distinct('jumlah_kursi')->pluck('jumlah_kursi');
        $navCategory = JenisMobil::has('mobil')->distinct('mobil.id_jenis_mobil')->pluck('jenis_mobil', 'id');
        // dd($navCategory);

        // if ($category != null && $name != null && $passenger != 1) {
        //     // jika category selain semua dan name tidak null dan passenger selain 1
        //     $informasi = Mobil::with('jenisMobil')
        //     ->where([
        //         ['jenisMobil.id', $category],
        //         ['mobil.name', 'like', '%'.$name.'%'],
        //         ['mobil.jumlah', ]
        //     ])
        //     ->orderby('id', 'desc')
        //     ->paginate(4);
        // } elseif ($kategori != 'semua') {
        //     // jika kategori selain semua
        //     $informasi = Post::where([
        //         ['isbagian', 0],
        //         ['status', 1],
        //         ['jenis', 'like', '%'.$kategori.'%']
        //     ])
        //     ->orderby('id', 'desc')
        //     ->paginate(4);
        // } elseif ($pencarian != null) {
        //     // jika pencarian ada
        //     $informasi = Post::where([
        //         ['isbagian', 0],
        //         ['status', 1],
        //         ['judul', 'like', '%'.$pencarian.'%']
        //     ])
        //     ->orderby('id', 'desc')
        //     ->paginate(4);
        // } else {
        //     // jika kategori dan pencarian null
        //     $informasi = Post::where([
        //         ['isbagian', 0],
        //         ['status', 1]
        //     ])
        //     ->orderby('id', 'desc')
        //     ->paginate(4);
        // }

        return view('welcome2', compact('mobil', 'navJumlahKursi', 'navCategory'));
    }
}
