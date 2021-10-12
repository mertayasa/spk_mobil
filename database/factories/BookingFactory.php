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
        $rand_number = rand(1, 10);

        $booking_start_date = Carbon::now()->addDay($rand_number);
        $booking_end_date = Carbon::now()->addDay($rand_number+rand(1,5));
        return [
            'id_mobil' => Mobil::inRandomOrder()->first()->id,
            'id_user' => User::where('level', 2)->inRandomOrder()->first()->id,
            'id_sopir' => Sopir::inRandomOrder()->first()->id,
            'deskripsi' => $this->faker->text,
            'harga' => $this->faker->numberBetween(150000, 500000),
            'tgl_mulai_sewa' => $booking_start_date,
            'tgl_akhir_sewa' => $booking_end_date,
            'bukti_trf' => 'default/default.jpeg'
        ];
    }
}
