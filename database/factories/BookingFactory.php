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
        $dengan_sopir = ['ya', 'tidak'];
        $pengambilan = ['diantar', 'ambil_sendiri'];
        $dengan_sopir_val = $dengan_sopir[rand(0, 1)];
        $pengambilan_val = $pengambilan[rand(0, 1)];

        return [
            'id_mobil' => Mobil::inRandomOrder()->first()->id,
            'id_user' => User::where('level', 2)->inRandomOrder()->first()->id,
            'id_sopir' => $dengan_sopir_val == 'ya' ? Sopir::inRandomOrder()->first()->id : null,
            'deskripsi' => $this->faker->text,
            'dengan_sopir' => $dengan_sopir_val,
            'pengambilan' => $pengambilan_val,
            'alamat_antar' => $pengambilan_val == 'diantar' ? $this->faker->address() : null,
            'harga' => $this->faker->numberBetween(150000, 500000),
            'tgl_mulai_sewa' => $booking_start_date,
            'tgl_akhir_sewa' => $booking_end_date,
            'bukti_trf' => 'default/default.jpeg'
        ];
    }
}
