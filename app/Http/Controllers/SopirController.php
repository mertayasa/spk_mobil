<?php

namespace App\Http\Controllers;

use App\Http\Requests\SopirControllerStoreRequest;
use App\Http\Requests\SopirControllerUpdateRequest;
use App\Models\Sopir;
use Illuminate\Http\Request;

class SopirController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('sopir.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function datatable(Request $request)
    {
        $sopirs = Sopir::all();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('sopir.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sopir $sopir
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Sopir $sopir)
    {
        return view('sopir.edit', compact('sopir'));
    }

    /**
     * @param \App\Http\Requests\SopirControllerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SopirControllerStoreRequest $request)
    {
        $sopir = Sopir::create($request->validated());

        return redirect()->route('sopir.index');
    }

    /**
     * @param \App\Http\Requests\SopirControllerUpdateRequest $request
     * @param \App\Models\Sopir $sopir
     * @return \Illuminate\Http\Response
     */
    public function update(SopirControllerUpdateRequest $request, Sopir $sopir)
    {
        $sopir->update($request->validated());

        return redirect()->route('sopir.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sopir $sopir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Sopir $sopir)
    {
        $sopir->delete();
    }
}
