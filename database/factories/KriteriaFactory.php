<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Kriteria;

class KriteriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Kriteria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kriteria' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'bobot' => $this->faker->randomFloat(0, 0, 9999999999.),
            'sifat' => $this->faker->numberBetween(-8, 8),
        ];
    }
}
