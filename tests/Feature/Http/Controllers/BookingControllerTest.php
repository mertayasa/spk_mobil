<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Booking;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BookingController
 */
class BookingControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('booking.index'));

        $response->assertOk();
        $response->assertViewIs('booking.index');
    }


    /**
     * @test
     */
    public function datatable_behaves_as_expected()
    {
        $bookings = Booking::factory()->count(3)->create();

        $response = $this->get(route('booking.datatable'));
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('booking.create'));

        $response->assertOk();
        $response->assertViewIs('booking.create');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $booking = Booking::factory()->create();

        $response = $this->get(route('booking.edit', $booking));

        $response->assertOk();
        $response->assertViewIs('booking.edit');
        $response->assertViewHas('booking');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BookingController::class,
            'store',
            \App\Http\Requests\BookingControllerStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $id_mobil = $this->faker->randomNumber();
        $id_user = $this->faker->randomNumber();
        $deskripsi = $this->faker->text;
        $harga = $this->faker->numberBetween(-10000, 10000);
        $tgl_mulai_sewa = $this->faker->date();
        $tgl_akhir_sewa = $this->faker->date();

        $response = $this->post(route('booking.store'), [
            'id_mobil' => $id_mobil,
            'id_user' => $id_user,
            'deskripsi' => $deskripsi,
            'harga' => $harga,
            'tgl_mulai_sewa' => $tgl_mulai_sewa,
            'tgl_akhir_sewa' => $tgl_akhir_sewa,
        ]);

        $bookings = Booking::query()
            ->where('id_mobil', $id_mobil)
            ->where('id_user', $id_user)
            ->where('deskripsi', $deskripsi)
            ->where('harga', $harga)
            ->where('tgl_mulai_sewa', $tgl_mulai_sewa)
            ->where('tgl_akhir_sewa', $tgl_akhir_sewa)
            ->get();
        $this->assertCount(1, $bookings);
        $booking = $bookings->first();

        $response->assertRedirect(route('booking.index'));
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\BookingController::class,
            'update',
            \App\Http\Requests\BookingControllerUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $booking = Booking::factory()->create();
        $id_mobil = $this->faker->randomNumber();
        $id_user = $this->faker->randomNumber();
        $deskripsi = $this->faker->text;
        $harga = $this->faker->numberBetween(-10000, 10000);
        $tgl_mulai_sewa = $this->faker->date();
        $tgl_akhir_sewa = $this->faker->date();

        $response = $this->put(route('booking.update', $booking), [
            'id_mobil' => $id_mobil,
            'id_user' => $id_user,
            'deskripsi' => $deskripsi,
            'harga' => $harga,
            'tgl_mulai_sewa' => $tgl_mulai_sewa,
            'tgl_akhir_sewa' => $tgl_akhir_sewa,
        ]);

        $booking->refresh();

        $response->assertRedirect(route('booking.index'));

        $this->assertEquals($id_mobil, $booking->id_mobil);
        $this->assertEquals($id_user, $booking->id_user);
        $this->assertEquals($deskripsi, $booking->deskripsi);
        $this->assertEquals($harga, $booking->harga);
        $this->assertEquals(Carbon::parse($tgl_mulai_sewa), $booking->tgl_mulai_sewa);
        $this->assertEquals(Carbon::parse($tgl_akhir_sewa), $booking->tgl_akhir_sewa);
    }


    /**
     * @test
     */
    public function destroy_deletes()
    {
        $booking = Booking::factory()->create();

        $response = $this->delete(route('booking.destroy', $booking));

        $this->assertDeleted($booking);
    }
}
