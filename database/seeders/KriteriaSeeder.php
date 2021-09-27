<?php

namespace Database\Seeders;

use App\Models\Kriteria;
use Illuminate\Database\Seeder;

class KriteriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kriteria = [
            [
                'kriteria' => 'Kriteria 1',
                'bobot' => 0.2,
                'sifat' => 'cost'
            ],
            [
                'kriteria' => 'Kriteria 2',
                'bobot' => 0.3,
                'sifat' => 'benefit'
            ],
            [
                'kriteria' => 'Kriteria 3',
                'bobot' => 0.2,
                'sifat' => 'cost'
            ],
            [
                'kriteria' => 'Kriteria 4',
                'bobot' => 0.1,
                'sifat' => 'cost'
            ],
            [
                'kriteria' => 'Kriteria 5',
                'bobot' => 0.2,
                'sifat' => 'cost'
            ],
        ];

        foreach($kriteria as $krite){
            Kriteria::create($krite);
        }
    }
}
