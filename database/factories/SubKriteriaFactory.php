<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Kriterium;
use App\Models\SubKriteria;

class SubKriteriaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubKriteria::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'kriteria' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'id_kriteria' => Kriterium::factory(),
            'sub_kriteria' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'skor' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'sifat' => $this->faker->numberBetween(-8, 8),
        ];
    }
}
