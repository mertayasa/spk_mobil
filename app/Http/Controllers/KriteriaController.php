<?php

namespace App\Http\Controllers;

use App\Http\Requests\KriteriaControllerStoreRequest;
use App\Http\Requests\KriteriaControllerUpdateRequest;
use App\Models\Kriteria;
use Illuminate\Http\Request;

class KriteriaController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('kriteria.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function datatable(Request $request)
    {
        $kriteria = Kriterium::all();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('kriteria.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Kriteria $kriterium
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Kriterium $kriterium)
    {
        return view('kriteria.edit', compact('kriteria'));
    }

    /**
     * @param \App\Http\Requests\KriteriaControllerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(KriteriaControllerStoreRequest $request)
    {
        $kriteria = Kriteria::create($request->validated());

        return redirect()->route('kriteria.index');
    }

    /**
     * @param \App\Http\Requests\KriteriaControllerUpdateRequest $request
     * @param \App\Models\Kriteria $kriterium
     * @return \Illuminate\Http\Response
     */
    public function update(KriteriaControllerUpdateRequest $request, Kriterium $kriterium)
    {
        $kriteria->update($request->validated());

        return redirect()->route('kriteria.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Kriteria $kriterium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Kriterium $kriterium)
    {
        $kriteria->delete();
    }
}
