<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Sopir;

class SopirFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sopir::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'telpon' => $this->faker->regexify('[A-Za-z0-9]{16}'),
            'alamat' => $this->faker->text,
            'tempat_lahir' => $this->faker->regexify('[A-Za-z0-9]{50}'),
            'tanggal_lahir' => $this->faker->date(),
            'no_ktp' => $this->faker->regexify('[A-Za-z0-9]{16}'),
        ];
    }
}
