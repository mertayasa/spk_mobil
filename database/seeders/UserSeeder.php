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
                'name' => 'Admin',
                'email' => 'admin@demo.com',
                'level' => 0,
                'email_verified_at' => now(),
                'password' => bcrypt('asdasdasd'), // password
                'remember_token' => Str::random(10),
            ],
            // [
            //     'name' => 'Sekretaris',
            //     'email' => 'sekre@demo.com',
            //     'phone' => $faker->e164PhoneNumber(),
            //     'date_of_birth' => $faker->dateTimeBetween(Carbon::now()->subYear(30), Carbon::now()->subYear(18)),
            //     'active_status' => 1,
            //     'address' => $faker->address(),
            //     'level' => 1,
            //     'gender' => rand(0,1),
            //     'photo' => 'blank_user.png',
            //     'email_verified_at' => now(),
            //     'password' => bcrypt('asdasdasd'), // password
            //     'remember_token' => Str::random(10),
            // ],
            // [
            //     'name' => 'Bendahara',
            //     'email' => 'bendahara@demo.com',
            //     'phone' => $faker->e164PhoneNumber(),
            //     'date_of_birth' => $faker->dateTimeBetween(Carbon::now()->subYear(30), Carbon::now()->subYear(18)),
            //     'active_status' => 1,
            //     'address' => $faker->address(),
            //     'level' => 2,
            //     'gender' => rand(0,1),
            //     'photo' => 'blank_user.png',
            //     'email_verified_at' => now(),
            //     'password' => bcrypt('asdasdasd'), // password
            //     'remember_token' => Str::random(10),
            // ]
        ];
            
        foreach($users as $user){
            User::updateOrCreate(['email' => $user['email']], $user);
        }
    }
}
