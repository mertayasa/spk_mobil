<?php

namespace App\Http\Controllers;

use App\Http\Requests\MobilControllerStoreRequest;
use App\Http\Requests\MobilControllerUpdateRequest;
use App\Models\Mobil;
use Illuminate\Http\Request;

class MobilController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('mobil.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function datatable(Request $request)
    {
        $mobils = Mobil::all();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('mobil.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Mobil $mobil
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Mobil $mobil)
    {
        return view('mobil.edit', compact('mobil'));
    }

    /**
     * @param \App\Http\Requests\MobilControllerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MobilControllerStoreRequest $request)
    {
        $mobil = Mobil::create($request->validated());

        return redirect()->route('mobil.index');
    }

    /**
     * @param \App\Http\Requests\MobilControllerUpdateRequest $request
     * @param \App\Models\Mobil $mobil
     * @return \Illuminate\Http\Response
     */
    public function update(MobilControllerUpdateRequest $request, Mobil $mobil)
    {
        $mobil->update($request->validated());

        return redirect()->route('mobil.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Mobil $mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Mobil $mobil)
    {
        $mobil->delete();
    }
}
