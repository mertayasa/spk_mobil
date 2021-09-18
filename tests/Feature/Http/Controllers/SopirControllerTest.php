<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Sopir;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SopirController
 */
class SopirControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('sopir.index'));

        $response->assertOk();
        $response->assertViewIs('sopir.index');
    }


    /**
     * @test
     */
    public function datatable_behaves_as_expected()
    {
        $sopirs = Sopir::factory()->count(3)->create();

        $response = $this->get(route('sopir.datatable'));
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('sopir.create'));

        $response->assertOk();
        $response->assertViewIs('sopir.create');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $sopir = Sopir::factory()->create();

        $response = $this->get(route('sopir.edit', $sopir));

        $response->assertOk();
        $response->assertViewIs('sopir.edit');
        $response->assertViewHas('sopir');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SopirController::class,
            'store',
            \App\Http\Requests\SopirControllerStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $nama = $this->faker->word;
        $telpon = $this->faker->word;
        $alamat = $this->faker->text;
        $tempat_lahir = $this->faker->word;
        $tanggal_lahir = $this->faker->date();
        $no_ktp = $this->faker->word;

        $response = $this->post(route('sopir.store'), [
            'nama' => $nama,
            'telpon' => $telpon,
            'alamat' => $alamat,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'no_ktp' => $no_ktp,
        ]);

        $sopirs = Sopir::query()
            ->where('nama', $nama)
            ->where('telpon', $telpon)
            ->where('alamat', $alamat)
            ->where('tempat_lahir', $tempat_lahir)
            ->where('tanggal_lahir', $tanggal_lahir)
            ->where('no_ktp', $no_ktp)
            ->get();
        $this->assertCount(1, $sopirs);
        $sopir = $sopirs->first();

        $response->assertRedirect(route('sopir.index'));
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SopirController::class,
            'update',
            \App\Http\Requests\SopirControllerUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $sopir = Sopir::factory()->create();
        $nama = $this->faker->word;
        $telpon = $this->faker->word;
        $alamat = $this->faker->text;
        $tempat_lahir = $this->faker->word;
        $tanggal_lahir = $this->faker->date();
        $no_ktp = $this->faker->word;

        $response = $this->put(route('sopir.update', $sopir), [
            'nama' => $nama,
            'telpon' => $telpon,
            'alamat' => $alamat,
            'tempat_lahir' => $tempat_lahir,
            'tanggal_lahir' => $tanggal_lahir,
            'no_ktp' => $no_ktp,
        ]);

        $sopir->refresh();

        $response->assertRedirect(route('sopir.index'));

        $this->assertEquals($nama, $sopir->nama);
        $this->assertEquals($telpon, $sopir->telpon);
        $this->assertEquals($alamat, $sopir->alamat);
        $this->assertEquals($tempat_lahir, $sopir->tempat_lahir);
        $this->assertEquals(Carbon::parse($tanggal_lahir), $sopir->tanggal_lahir);
        $this->assertEquals($no_ktp, $sopir->no_ktp);
    }


    /**
     * @test
     */
    public function destroy_deletes()
    {
        $sopir = Sopir::factory()->create();

        $response = $this->delete(route('sopir.destroy', $sopir));

        $this->assertDeleted($sopir);
    }
}
