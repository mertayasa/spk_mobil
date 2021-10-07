<?php

namespace App\Http\Controllers;

use App\Models\DetailSaw;
use App\Models\HasilSaw;
use App\Models\Kriteria;
use App\Models\Mobil;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SAWController extends Controller
{
    public function index()
    {
        $mobil = Mobil::all();
        $hasil_saw = HasilSaw::with('mobil')->orderBy('nilai_akhir', 'desc')->get();
        $kriteria = Kriteria::all();

        return view('saw.index', compact('mobil', 'kriteria', 'hasil_saw'));
    }

    public function update(Request $request)
    {
        // dd($request->all());
        $datas = $request->all();

        // dd($datas);

        $array_init = [];

        foreach($datas as $key => $data){
            if(str_contains($key, 'kriteria')){
                array_push($array_init, $data);
            }
        }

        // dd($array_init);

        $array_data = [];

        foreach($array_init as $key => $data){
            $array_kriteria = [];
            
            foreach($data as $key_krite => $asd){
                if(str_contains($key_krite, 'kriteria')){
                    $array_kriteria += [$key_krite => $asd];
                }
            }

            $array_data += [$data['id_mobil'] => $array_kriteria];
        }

        // dd($array_data);

        $array_kriteria = [];

        # Iterate over every associative array in the data array.
        foreach ($array_data as $element) {
            # Iterate over every key-value pair of the associative array.
            foreach ($element as $key => $value) {
               # Ensure the sub-array specified by the key is set.
               if (!isset($array_kriteria[$key])) $array_kriteria[$key] = [];
    
               # Insert the value in the sub-array specified by the key.
               $array_kriteria[$key][] = $value;
            }
        }

        // dd($array_data);


        $normalisasi = [];
        foreach($array_kriteria as $key => $kriteria){
            $model_kriteria = Kriteria::find(str_replace('kriteria', '', $key));
            
            $array_normal = [];
            if($model_kriteria->sifat == 'cost'){
                $min = min($kriteria);
                foreach($kriteria as $krite){
                    array_push($array_normal, round($min/$krite, 2));
                }

                $normalisasi += [$key => $array_normal];
            }
            
            if($model_kriteria->sifat == 'benefit'){
                $min = max($kriteria);
                foreach($kriteria as $krite){
                    array_push($array_normal, round($krite/$min, 2));
                }

                $normalisasi += [$key => $array_normal];
            }
        }

        // dd($normalisasi);

        $preferensi = [];
    
        foreach($normalisasi as $key => $normal){
            $model_kriteria = Kriteria::find(str_replace('kriteria', '', $key));
            
            $prefer = [];
            foreach($normal as $key_nor => $nor){
                $prefer += [$array_init[$key_nor]['id_mobil'] => $nor * $model_kriteria->bobot];    
            }

            $preferensi += [$key => $prefer];
        }


        $new_preferensi = [];

        # Iterate over every associative array in the data array.
        foreach ($preferensi as $element) {
            # Iterate over every key-value pair of the associative array.
            foreach ($element as $key => $value) {
               # Ensure the sub-array specified by the key is set.
               if (!isset($new_preferensi[$key])) $new_preferensi[$key] = [];
    
               # Insert the value in the sub-array specified by the key.
               $new_preferensi[$key][] = $value;
            }
        }

        $nilai_akhir = [];

        foreach($new_preferensi as $key => $prefer){
            array_push($nilai_akhir,['id_mobil' => $key, 'nilai_akhir' => round(array_sum($prefer), 2)]);
        }

        // Eloquent::unguard();

		//disable foreign key check for this connection before running seeders
		DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        HasilSaw::truncate();
        DetailSaw::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // DB::table('detail_saw')->truncate();
        // DB::table('hasil_saw')->truncate();

        $id_hasil_saw = [];

        foreach($nilai_akhir as $akhir){
            $nilai_akhir = HasilSaw::create($akhir);

            array_push($id_hasil_saw, $nilai_akhir->id);
        }

        $detail_temp = [];

        foreach($array_init as $key => $data){
            $array_kriteria = [];
            
            foreach($data as $key_krite => $asd){
                if(str_contains($key_krite, 'kriteria')){
                    array_push($array_kriteria, ['id_kriteria' => str_replace('kriteria', '', $key_krite), 'id_sub_kriteria' => $asd, 'id_hasil_saw' => $id_hasil_saw[$key]]);
                }
            }

            array_push($detail_temp, $array_kriteria);
        }

        foreach($detail_temp as $detail){
            foreach($detail as $det){
                DetailSaw::create($det);
            }
        }

        return redirect()->route('saw.index')->with('success', 'Berhasil meng-update data perhitungan SAW');

        // dd($detail_temp);
    }

    public function sawFrontend(Request $request)
    {
        // return response(['code' => 0, 'message' => 'Gagal mencari mobil yang sesuai']);

        try{
            $data = $request->all();
            unset($data['_token']);
            unset($data['/saw/saw-frontend']);
            
            $kriteria = Kriteria::with('subKriteria')->get();
            if(count($data) < $kriteria->count() || count($data) > $kriteria->count()){
                return response(['code' => 0, 'message' => 'Data pencarian tidak sesuai']);
            }
            
            $sub_kriteria = Mobil::with('detailSaw')->get()->pluck('saw')->toArray();

            $sanitize_data = [];
            foreach($data as $key => $da){
                $sanitize_data += [str_replace('kriteria', '', $key) => $da];
            }

            $sanitize_data = ['id_mobil' => 'new'] + $sanitize_data;

            array_push($sub_kriteria, $sanitize_data);

            $saw = $this->calculateSaw($sub_kriteria);
            
            usort($saw, function($a, $b) {
                return $a['nilai_akhir'] <=> $b['nilai_akhir'];
            });

            // Log::info($saw);

            $search_array = array_search('new', array_column($saw, 'id_mobil'));

            if($search_array == 0){
                $closest_mobil = $saw[1];
            }else{
                if($saw[$search_array]['nilai_akhir'] - $saw[$search_array + 1]['nilai_akhir'] < $saw[$search_array]['nilai_akhir'] - $saw[$search_array -1 ]['nilai_akhir']){
                    $closest_mobil = $saw[$search_array + 1];
                }else{
                    $closest_mobil = $saw[$search_array - 1];
                };
            }

            $mobil = Mobil::find($closest_mobil['id_mobil']);
            $html =  view('frontend.layouts.card_car', ['item' => $mobil, 'index' => $mobil->id])->render();
        }catch(Exception $e){
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal mencari mobil yang sesuai']);
        }

        return response(['code' => 1, 'mobil' => $mobil, 'card' => $html]);
    }

    public function calculateSaw($array_init)
    {
        $array_data = [];

        foreach($array_init as $key => $data){
            $array_kriteria = [];
            
            foreach($data as $key_krite => $asd){
                if(!str_contains($key_krite, 'id_mobil')){
                    $array_kriteria += [$key_krite => $asd];
                }
            }

            $array_data += [$data['id_mobil'] => $array_kriteria];
        }


        $array_kriteria = [];

        foreach ($array_data as $element) {
            # Iterate over every key-value pair of the associative array.
            foreach ($element as $key => $value) {
               # Ensure the sub-array specified by the key is set.
               if (!isset($array_kriteria[$key])) $array_kriteria[$key] = [];
    
               # Insert the value in the sub-array specified by the key.
               $array_kriteria[$key][] = $value;
            }
        }

        // dd($array_kriteria);


        $normalisasi = [];
        foreach($array_kriteria as $key => $kriteria){
            $model_kriteria = Kriteria::find($key);
            
            $array_normal = [];
            if($model_kriteria->sifat == 'cost'){
                $min = min($kriteria);
                foreach($kriteria as $krite){
                    array_push($array_normal, round($min/$krite, 2));
                }

                $normalisasi += [$key => $array_normal];
            }
            
            if($model_kriteria->sifat == 'benefit'){
                $min = max($kriteria);
                foreach($kriteria as $krite){
                    array_push($array_normal, round($krite/$min, 2));
                }

                $normalisasi += [$key => $array_normal];
            }
        }

        // dd($normalisasi);

        $preferensi = [];
    
        foreach($normalisasi as $key => $normal){
            $model_kriteria = Kriteria::find($key);
            
            $prefer = [];
            foreach($normal as $key_nor => $nor){
                $prefer += [$array_init[$key_nor]['id_mobil'] => $nor * $model_kriteria->bobot];    
            }

            $preferensi += [$key => $prefer];
        }

        // dd($preferensi);


        $new_preferensi = [];

        # Iterate over every associative array in the data array.
        foreach ($preferensi as $element) {
            # Iterate over every key-value pair of the associative array.
            foreach ($element as $key => $value) {
               # Ensure the sub-array specified by the key is set.
               if (!isset($new_preferensi[$key])) $new_preferensi[$key] = [];
    
               # Insert the value in the sub-array specified by the key.
               $new_preferensi[$key][] = $value;
            }
        }


        $nilai_akhir = [];

        foreach($new_preferensi as $key => $prefer){
            array_push($nilai_akhir,['id_mobil' => $key, 'nilai_akhir' => round(array_sum($prefer), 2)]);
        }

        return $nilai_akhir;

        // dd($nilai_akhir);
    }
}
