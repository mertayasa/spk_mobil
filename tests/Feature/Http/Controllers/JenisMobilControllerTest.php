<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\JenisMobil;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use JMac\Testing\Traits\AdditionalAssertions;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\JenisMobilController
 */
class JenisMobilControllerTest extends TestCase
{
    use AdditionalAssertions, RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function index_displays_view()
    {
        $response = $this->get(route('jenis-mobil.index'));

        $response->assertOk();
        $response->assertViewIs('jenis_mobil.index');
    }


    /**
     * @test
     */
    public function datatable_behaves_as_expected()
    {
        $jenisMobils = JenisMobil::factory()->count(3)->create();

        $response = $this->get(route('jenis-mobil.datatable'));
    }


    /**
     * @test
     */
    public function create_displays_view()
    {
        $response = $this->get(route('jenis-mobil.create'));

        $response->assertOk();
        $response->assertViewIs('jenis_mobil.create');
    }


    /**
     * @test
     */
    public function edit_displays_view()
    {
        $jenisMobil = JenisMobil::factory()->create();

        $response = $this->get(route('jenis-mobil.edit', $jenisMobil));

        $response->assertOk();
        $response->assertViewIs('jenis_mobil.edit');
        $response->assertViewHas('jenis_mobil');
    }


    /**
     * @test
     */
    public function store_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\JenisMobilController::class,
            'store',
            \App\Http\Requests\JenisMobilControllerStoreRequest::class
        );
    }

    /**
     * @test
     */
    public function store_saves_and_redirects()
    {
        $jenis_mobil = $this->faker->word;

        $response = $this->post(route('jenis-mobil.store'), [
            'jenis_mobil' => $jenis_mobil,
        ]);

        $jenisMobils = JenisMobil::query()
            ->where('jenis_mobil', $jenis_mobil)
            ->get();
        $this->assertCount(1, $jenisMobils);
        $jenisMobil = $jenisMobils->first();

        $response->assertRedirect(route('jenis_mobil.index'));
    }


    /**
     * @test
     */
    public function update_uses_form_request_validation()
    {
        $this->assertActionUsesFormRequest(
            \App\Http\Controllers\JenisMobilController::class,
            'update',
            \App\Http\Requests\JenisMobilControllerUpdateRequest::class
        );
    }

    /**
     * @test
     */
    public function update_redirects()
    {
        $jenisMobil = JenisMobil::factory()->create();
        $jenis_mobil = $this->faker->word;

        $response = $this->put(route('jenis-mobil.update', $jenisMobil), [
            'jenis_mobil' => $jenis_mobil,
        ]);

        $jenisMobil->refresh();

        $response->assertRedirect(route('jenis_mobil.index'));

        $this->assertEquals($jenis_mobil, $jenisMobil->jenis_mobil);
    }


    /**
     * @test
     */
    public function destroy_deletes()
    {
        $jenisMobil = JenisMobil::factory()->create();

        $response = $this->delete(route('jenis-mobil.destroy', $jenisMobil));

        $this->assertDeleted($jenisMobil);
    }
}
