<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserSeeder::class);
        $this->call(JenisMobilSeeder::class);
        $this->call(SopirSeeder::class);
        $this->call(MobilSeeder::class);
        $this->call(BookingSeeder::class);
        $this->call(KriteriaSeeder::class);
        $this->call(SubKriteriaSeeder::class);
        // \App\Models\User::factory(10)->create();
    }
}
