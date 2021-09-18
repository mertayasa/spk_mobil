<?php

namespace App\Http\Controllers;

use App\Http\Requests\JenisMobilControllerStoreRequest;
use App\Http\Requests\JenisMobilControllerUpdateRequest;
use App\Models\JenisMobil;
use Illuminate\Http\Request;

class JenisMobilController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('jenis_mobil.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function datatable(Request $request)
    {
        $jenisMobils = JenisMobil::all();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('jenis_mobil.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JenisMobil $jenisMobil
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, JenisMobil $jenisMobil)
    {
        return view('jenis_mobil.edit', compact('jenis_mobil'));
    }

    /**
     * @param \App\Http\Requests\JenisMobilControllerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(JenisMobilControllerStoreRequest $request)
    {
        $jenisMobil = JenisMobil::create($request->validated());

        return redirect()->route('jenis_mobil.index');
    }

    /**
     * @param \App\Http\Requests\JenisMobilControllerUpdateRequest $request
     * @param \App\Models\JenisMobil $jenisMobil
     * @return \Illuminate\Http\Response
     */
    public function update(JenisMobilControllerUpdateRequest $request, JenisMobil $jenisMobil)
    {
        $jenisMobil->update($request->validated());

        return redirect()->route('jenis_mobil.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JenisMobil $jenisMobil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, JenisMobil $jenisMobil)
    {
        $jenisMobil->delete();
    }
}
