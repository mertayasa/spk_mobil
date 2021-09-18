<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Kriteria;
use App\Models\Kriterium;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\KriteriaController
 */
class KriteriaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('kriterium.index'));

        $response->assertOk();
        $response->assertViewIs('kriteria.index');
    }


    /**
     * @test
     */
    public function datatable_behaves_as_expected()
    {
        $kriteria = Kriteria::factory()->count(3)->create();

        $response = $this->get(route('kriterium.datatable'));
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('kriterium.create'));

        $response->assertOk();
        $response->assertViewIs('kriteria.create');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $kriterium = Kriteria::factory()->create();

        $response = $this->get(route('kriterium.edit', $kriterium));

        $response->assertOk();
        $response->assertViewIs('kriteria.edit');
        $response->assertViewHas('kriteria');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\KriteriaController::class,
            'store',
            \App\Http\Requests\KriteriaControllerStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $kriteria = $this->faker->word;

        $response = $this->post(route('kriterium.store'), [
            'kriteria' => $kriteria,
        ]);

        $kriteria = Kriteria::query()
            ->where('kriteria', $kriteria)
            ->get();
        $this->assertCount(1, $kriteria);
        $kriterium = $kriteria->first();

        $response->assertRedirect(route('kriteria.index'));
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\KriteriaController::class,
            'update',
            \App\Http\Requests\KriteriaControllerUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $kriterium = Kriteria::factory()->create();
        $kriteria = $this->faker->word;

        $response = $this->put(route('kriterium.update', $kriterium), [
            'kriteria' => $kriteria,
        ]);

        $kriterium->refresh();

        $response->assertRedirect(route('kriteria.index'));

        $this->assertEquals($kriteria, $kriterium->kriteria);
    }


    /**
     * @test
     */
    public function destroy_deletes()
    {
        $kriterium = Kriteria::factory()->create();

        $response = $this->delete(route('kriterium.destroy', $kriterium));

        $this->assertDeleted($kriterium);
    }
}
