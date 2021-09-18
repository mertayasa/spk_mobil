<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\DeatailSaw;
use App\Models\HasilSaw;
use App\Models\Kriterium;

class DeatailSawFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = DeatailSaw::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_hasil_saw' => HasilSaw::factory(),
            'id_kriteria' => Kriterium::factory(),
        ];
    }
}
