<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubKriteriaControllerStoreRequest;
use App\Http\Requests\SubKriteriaControllerUpdateRequest;
use App\Models\SubKriteria;
use Illuminate\Http\Request;

class SubKriteriaController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('sub_kriteria.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function datatable(Request $request)
    {
        $subKriteria = SubKriterium::all();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('sub_kriteria.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SubKriteria $subKriterium
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SubKriterium $subKriterium)
    {
        return view('sub_kriteria.edit', compact('sub_kriteria'));
    }

    /**
     * @param \App\Http\Requests\SubKriteriaControllerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubKriteriaControllerStoreRequest $request)
    {
        $subKriteria = SubKriteria::create($request->validated());

        return redirect()->route('sub_kriteria.index');
    }

    /**
     * @param \App\Http\Requests\SubKriteriaControllerUpdateRequest $request
     * @param \App\Models\SubKriteria $subKriterium
     * @return \Illuminate\Http\Response
     */
    public function update(SubKriteriaControllerUpdateRequest $request, SubKriterium $subKriterium)
    {
        $subKriteria->update($request->validated());

        return redirect()->route('sub_kriteria.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SubKriteria $subKriterium
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, SubKriterium $subKriterium)
    {
        $subKriteria->delete();
    }
}
