<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\HasilSaw;
use App\Models\Mobil;

class HasilSawFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HasilSaw::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kriteria' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'id_mobil' => Mobil::factory(),
            'nilai_akhir' => $this->faker->randomFloat(0, 0, 9999999999.),
        ];
    }
}
