<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');

        $users = [
            [
                'nama' => 'Admin',
                'telpon' => $faker->e164PhoneNumber(),
                'email' => 'admin@demo.com',
                'jenis_kelamin' => rand(0,1),
                'status_aktif' => 1,
                'alamat' => $faker->address(),
                'no_ktp' => '5105012105980001',
                'level' => 0,
                'photo' => 'default.jpeg',
                'email_verified_at' => now(),
                'password' => bcrypt('asdasdasd'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'nama' => 'Owner',
                'telpon' => $faker->e164PhoneNumber(),
                'email' => 'owner@demo.com',
                'jenis_kelamin' => rand(0,1),
                'status_aktif' => 1,
                'alamat' => $faker->address(),
                'no_ktp' => '5105012105980001',
                'level' => 1,
                'photo' => 'default.jpeg',
                'email_verified_at' => now(),
                'password' => bcrypt('asdasdasd'), // password
                'remember_token' => Str::random(10),
            ],
            [
                'nama' => 'User',
                'telpon' => $faker->e164PhoneNumber(),
                'email' => 'user@demo.com',
                'jenis_kelamin' => rand(0,1),
                'status_aktif' => 1,
                'alamat' => $faker->address(),
                'no_ktp' => '5105012105980001',
                'level' => 2,
                'photo' => 'default.jpeg',
                'email_verified_at' => now(),
                'password' => bcrypt('asdasdasd'), // password
                'remember_token' => Str::random(10),
            ]
        ];
            
        foreach($users as $user){
            User::updateOrCreate(['email' => $user['email']], $user);
        }

        User::factory()->count(10)->create();
    }
}
