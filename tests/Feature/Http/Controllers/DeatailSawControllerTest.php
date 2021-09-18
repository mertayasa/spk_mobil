<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\DeatailSaw;
use App\Models\DetailSaw;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DeatailSawController
 */
class DeatailSawControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('deatail-saw.index'));

        $response->assertOk();
        $response->assertViewIs('detail_saw.index');
    }


    /**
     * @test
     */
    public function datatable_behaves_as_expected()
    {
        $deatailSaws = DeatailSaw::factory()->count(3)->create();

        $response = $this->get(route('deatail-saw.datatable'));
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('deatail-saw.create'));

        $response->assertOk();
        $response->assertViewIs('detail_saw.create');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $deatailSaw = DeatailSaw::factory()->create();

        $response = $this->get(route('deatail-saw.edit', $deatailSaw));

        $response->assertOk();
        $response->assertViewIs('detail_saw.edit');
        $response->assertViewHas('detail_saw');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DeatailSawController::class,
            'store',
            \App\Http\Requests\DeatailSawControllerStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $id_hasil_saw = $this->faker->randomNumber();
        $id_kriteria = $this->faker->randomNumber();

        $response = $this->post(route('deatail-saw.store'), [
            'id_hasil_saw' => $id_hasil_saw,
            'id_kriteria' => $id_kriteria,
        ]);

        $deatailSaws = DetailSaw::query()
            ->where('id_hasil_saw', $id_hasil_saw)
            ->where('id_kriteria', $id_kriteria)
            ->get();
        $this->assertCount(1, $deatailSaws);
        $deatailSaw = $deatailSaws->first();

        $response->assertRedirect(route('detail_saw.index'));
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\DeatailSawController::class,
            'update',
            \App\Http\Requests\DeatailSawControllerUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $deatailSaw = DeatailSaw::factory()->create();
        $id_hasil_saw = $this->faker->randomNumber();
        $id_kriteria = $this->faker->randomNumber();

        $response = $this->put(route('deatail-saw.update', $deatailSaw), [
            'id_hasil_saw' => $id_hasil_saw,
            'id_kriteria' => $id_kriteria,
        ]);

        $deatailSaw->refresh();

        $response->assertRedirect(route('detail_saw.index'));

        $this->assertEquals($id_hasil_saw, $deatailSaw->id_hasil_saw);
        $this->assertEquals($id_kriteria, $deatailSaw->id_kriteria);
    }


    /**
     * @test
     */
    public function destroy_deletes()
    {
        $deatailSaw = DeatailSaw::factory()->create();
        $deatailSaw = DetailSaw::factory()->create();

        $response = $this->delete(route('deatail-saw.destroy', $deatailSaw));

        $this->assertDeleted($deatailSaw);
    }
}
