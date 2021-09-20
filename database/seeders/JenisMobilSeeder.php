<?php

namespace Database\Seeders;

use App\Models\JenisMobil;
use Illuminate\Database\Seeder;

class JenisMobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis_mobil = [
            [
                'jenis_mobil' => 'Pickup'
            ],
            [
                'jenis_mobil' => 'Apv'
            ],
            [
                'jenis_mobil' => 'Sport'
            ],
            [
                'jenis_mobil' => 'Family'
            ],
        ];

        foreach($jenis_mobil as $jenis){
            JenisMobil::create($jenis);
        }
    }
}
