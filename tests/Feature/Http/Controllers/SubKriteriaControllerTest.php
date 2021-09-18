<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\SubKriteria;
use App\Models\SubKriterium;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SubKriteriaController
 */
class SubKriteriaControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('sub-kriterium.index'));

        $response->assertOk();
        $response->assertViewIs('sub_kriteria.index');
    }


    /**
     * @test
     */
    public function datatable_behaves_as_expected()
    {
        $subKriteria = SubKriteria::factory()->count(3)->create();

        $response = $this->get(route('sub-kriterium.datatable'));
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('sub-kriterium.create'));

        $response->assertOk();
        $response->assertViewIs('sub_kriteria.create');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $subKriterium = SubKriteria::factory()->create();

        $response = $this->get(route('sub-kriterium.edit', $subKriterium));

        $response->assertOk();
        $response->assertViewIs('sub_kriteria.edit');
        $response->assertViewHas('sub_kriteria');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SubKriteriaController::class,
            'store',
            \App\Http\Requests\SubKriteriaControllerStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $sub_kriteria = $this->faker->word;

        $response = $this->post(route('sub-kriterium.store'), [
            'sub_kriteria' => $sub_kriteria,
        ]);

        $subKriteria = SubKriteria::query()
            ->where('sub_kriteria', $sub_kriteria)
            ->get();
        $this->assertCount(1, $subKriteria);
        $subKriterium = $subKriteria->first();

        $response->assertRedirect(route('sub_kriteria.index'));
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\SubKriteriaController::class,
            'update',
            \App\Http\Requests\SubKriteriaControllerUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $subKriterium = SubKriteria::factory()->create();
        $sub_kriteria = $this->faker->word;

        $response = $this->put(route('sub-kriterium.update', $subKriterium), [
            'sub_kriteria' => $sub_kriteria,
        ]);

        $subKriterium->refresh();

        $response->assertRedirect(route('sub_kriteria.index'));

        $this->assertEquals($sub_kriteria, $subKriterium->sub_kriteria);
    }


    /**
     * @test
     */
    public function destroy_deletes()
    {
        $subKriterium = SubKriteria::factory()->create();

        $response = $this->delete(route('sub-kriterium.destroy', $subKriterium));

        $this->assertDeleted($subKriterium);
    }
}
