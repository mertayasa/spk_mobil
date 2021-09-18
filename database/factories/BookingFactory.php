<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Booking;
use App\Models\Mobil;
use App\Models\User;

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
            'id_mobil' => Mobil::factory(),
            'id_user' => User::factory(),
            'id_sopir' => User::factory(),
            'deskripsi' => $this->faker->text,
            'harga' => $this->faker->numberBetween(-10000, 10000),
            'tgl_mulai_sewa' => $this->faker->date(),
            'tgl_akhir_sewa' => $this->faker->date(),
        ];
    }
}
