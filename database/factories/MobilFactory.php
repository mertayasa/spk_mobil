<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\JenisMobil;
use App\Models\Mobil;

class MobilFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mobil::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'id_jenis_mobil' => JenisMobil::factory(),
            'deskripsi' => $this->faker->text,
            'harga' => $this->faker->numberBetween(-10000, 10000),
        ];
    }
}
