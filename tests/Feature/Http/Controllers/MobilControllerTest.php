<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Mobil;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\MobilController
 */
class MobilControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('mobil.index'));

        $response->assertOk();
        $response->assertViewIs('mobil.index');
    }


    /**
     * @test
     */
    public function datatable_behaves_as_expected()
    {
        $mobils = Mobil::factory()->count(3)->create();

        $response = $this->get(route('mobil.datatable'));
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('mobil.create'));

        $response->assertOk();
        $response->assertViewIs('mobil.create');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $mobil = Mobil::factory()->create();

        $response = $this->get(route('mobil.edit', $mobil));

        $response->assertOk();
        $response->assertViewIs('mobil.edit');
        $response->assertViewHas('mobil');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MobilController::class,
            'store',
            \App\Http\Requests\MobilControllerStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $nama = $this->faker->word;
        $id_jenis_mobil = $this->faker->randomNumber();
        $deskripsi = $this->faker->text;
        $harga = $this->faker->numberBetween(-10000, 10000);

        $response = $this->post(route('mobil.store'), [
            'nama' => $nama,
            'id_jenis_mobil' => $id_jenis_mobil,
            'deskripsi' => $deskripsi,
            'harga' => $harga,
        ]);

        $mobils = Mobil::query()
            ->where('nama', $nama)
            ->where('id_jenis_mobil', $id_jenis_mobil)
            ->where('deskripsi', $deskripsi)
            ->where('harga', $harga)
            ->get();
        $this->assertCount(1, $mobils);
        $mobil = $mobils->first();

        $response->assertRedirect(route('mobil.index'));
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\MobilController::class,
            'update',
            \App\Http\Requests\MobilControllerUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $mobil = Mobil::factory()->create();
        $nama = $this->faker->word;
        $id_jenis_mobil = $this->faker->randomNumber();
        $deskripsi = $this->faker->text;
        $harga = $this->faker->numberBetween(-10000, 10000);

        $response = $this->put(route('mobil.update', $mobil), [
            'nama' => $nama,
            'id_jenis_mobil' => $id_jenis_mobil,
            'deskripsi' => $deskripsi,
            'harga' => $harga,
        ]);

        $mobil->refresh();

        $response->assertRedirect(route('mobil.index'));

        $this->assertEquals($nama, $mobil->nama);
        $this->assertEquals($id_jenis_mobil, $mobil->id_jenis_mobil);
        $this->assertEquals($deskripsi, $mobil->deskripsi);
        $this->assertEquals($harga, $mobil->harga);
    }


    /**
     * @test
     */
    public function destroy_deletes()
    {
        $mobil = Mobil::factory()->create();

        $response = $this->delete(route('mobil.destroy', $mobil));

        $this->assertDeleted($mobil);
    }
}
