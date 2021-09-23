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
            'nama' => $this->faker->name(),
            'telpon' => $this->faker->e164PhoneNumber(),
            'alamat' => $this->faker->address(),
            'tempat_lahir' => $this->faker->city(),
            'tanggal_lahir' => $this->faker->date(),
            'no_ktp' => '515001'.$this->faker->numberBetween(101060, 210598).'0001',
            'photo' => 'default/default.jpeg',
        ];
    }
}
