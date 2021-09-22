<?php

namespace Database\Seeders;

use App\Models\JenisMobil;
use App\Models\Mobil;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;


class MobilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        $kursi = [0 => 2, 1 => 4, 2 => 6, 3 => 8];

        $mobil = [
            [
                'nama' => 'Avanza',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Alphard',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Agya',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Porsche 911 GT-S',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
        ];

        foreach($mobil as $mob){
            Mobil::create($mob);
        }
    }
}
