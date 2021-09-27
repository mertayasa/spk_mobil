<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use App\Models\SubKriteria;
use Illuminate\Database\Seeder;

class SubKriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriteria = Kriteria::all();

        foreach($kriteria as $krite){
            $sub = [0,1,2,3,4];
            foreach($sub as $key => $value){
                $sub_kriteria = [
                    'id_kriteria' => $krite->id,
                    'sub_kriteria' => 'Sub Kriteria '.($key+1),
                    'skor' => ($key+1),
                ];

                SubKriteria::create($sub_kriteria);
            }
        }
    }
}
