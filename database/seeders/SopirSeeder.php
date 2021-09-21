<?php

namespace Database\Seeders;

use App\Models\Sopir;
use Illuminate\Database\Seeder;

class SopirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sopir::factory()->count(10)->create();
    }
}
