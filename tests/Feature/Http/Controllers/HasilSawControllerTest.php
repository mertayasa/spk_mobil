<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\HasilSaw;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\HasilSawController
 */
class HasilSawControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('hasil-saw.index'));

        $response->assertOk();
        $response->assertViewIs('hasil_saw.index');
    }


    /**
     * @test
     */
    public function datatable_behaves_as_expected()
    {
        $hasilSaws = HasilSaw::factory()->count(3)->create();

        $response = $this->get(route('hasil-saw.datatable'));
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('hasil-saw.create'));

        $response->assertOk();
        $response->assertViewIs('hasil_saw.create');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $hasilSaw = HasilSaw::factory()->create();

        $response = $this->get(route('hasil-saw.edit', $hasilSaw));

        $response->assertOk();
        $response->assertViewIs('hasil_saw.edit');
        $response->assertViewHas('hasil_saw');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HasilSawController::class,
            'store',
            \App\Http\Requests\HasilSawControllerStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $kriteria = $this->faker->word;
        $id_mobil = $this->faker->randomNumber();
        $nilai_akhir = $this->faker->randomFloat(/** float_attributes **/);

        $response = $this->post(route('hasil-saw.store'), [
            'kriteria' => $kriteria,
            'id_mobil' => $id_mobil,
            'nilai_akhir' => $nilai_akhir,
        ]);

        $hasilSaws = HasilSaw::query()
            ->where('kriteria', $kriteria)
            ->where('id_mobil', $id_mobil)
            ->where('nilai_akhir', $nilai_akhir)
            ->get();
        $this->assertCount(1, $hasilSaws);
        $hasilSaw = $hasilSaws->first();

        $response->assertRedirect(route('hasil_saw.index'));
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\HasilSawController::class,
            'update',
            \App\Http\Requests\HasilSawControllerUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $hasilSaw = HasilSaw::factory()->create();
        $kriteria = $this->faker->word;
        $id_mobil = $this->faker->randomNumber();
        $nilai_akhir = $this->faker->randomFloat(/** float_attributes **/);

        $response = $this->put(route('hasil-saw.update', $hasilSaw), [
            'kriteria' => $kriteria,
            'id_mobil' => $id_mobil,
            'nilai_akhir' => $nilai_akhir,
        ]);

        $hasilSaw->refresh();

        $response->assertRedirect(route('hasil_saw.index'));

        $this->assertEquals($kriteria, $hasilSaw->kriteria);
        $this->assertEquals($id_mobil, $hasilSaw->id_mobil);
        $this->assertEquals($nilai_akhir, $hasilSaw->nilai_akhir);
    }


    /**
     * @test
     */
    public function destroy_deletes()
    {
        $hasilSaw = HasilSaw::factory()->create();

        $response = $this->delete(route('hasil-saw.destroy', $hasilSaw));

        $this->assertDeleted($hasilSaw);
    }
}
