<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Booking;
use App\Models\Mobil;
use App\Models\Sopir;
use App\Models\User;
use Carbon\Carbon;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_mobil' => Mobil::inRandomOrder()->first()->id,
            'id_user' => User::where('level', 2)->inRandomOrder()->first()->id,
            'id_sopir' => Sopir::inRandomOrder()->first()->id,
            'deskripsi' => $this->faker->text,
            'harga' => $this->faker->numberBetween(150000, 500000),
            'tgl_mulai_sewa' => Carbon::now(),
            'tgl_akhir_sewa' => Carbon::now()->addDay(3),
        ];
    }
}
