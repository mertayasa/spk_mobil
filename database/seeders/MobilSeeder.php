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
                'thumbnail' => 'default/mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Alphard',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'default/mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Agya',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'default/mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Porsche 911 GT-S',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'default/mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Lamborghini Gallardo',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Lamborghini Aventador',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Ferari',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'PickUp',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Jeep',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Terios',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Golf',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'BMW',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Mercedes Benz',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Tesla',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Honda',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Nissan GT',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Hammer',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Hyundai Kona Electric',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'BMW M3 Sport',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Kijang',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Rush',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Jazz',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Karimun',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Katana',
                'id_jenis_mobil' => JenisMobil::inRandomOrder()->first()->id,
                'deskripsi' => $faker->text(),
                'harga' => rand(150000, 500000),
                'thumbnail' => 'mobil.jpeg',
                'jumlah_kursi' => $kursi[rand(0,3)],
            ],
            [
                'nama' => 'Alya',
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
