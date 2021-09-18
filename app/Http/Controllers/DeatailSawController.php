<?php

namespace App\Http\Controllers;

use App\DetailSaw;
use App\Http\Requests\DeatailSawControllerStoreRequest;
use App\Http\Requests\DeatailSawControllerUpdateRequest;
use App\Models\DeatailSaw;
use Illuminate\Http\Request;

class DeatailSawController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('detail_saw.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function datatable(Request $request)
    {
        $deatailSaws = DeatailSaw::all();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('detail_saw.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DeatailSaw $deatailSaw
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, DeatailSaw $deatailSaw)
    {
        return view('detail_saw.edit', compact('detail_saw'));
    }

    /**
     * @param \App\Http\Requests\DeatailSawControllerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(DeatailSawControllerStoreRequest $request)
    {
        $detailSaw = DetailSaw::create($request->validated());

        return redirect()->route('detail_saw.index');
    }

    /**
     * @param \App\Http\Requests\DeatailSawControllerUpdateRequest $request
     * @param \App\Models\DeatailSaw $deatailSaw
     * @return \Illuminate\Http\Response
     */
    public function update(DeatailSawControllerUpdateRequest $request, DeatailSaw $deatailSaw)
    {
        $detailSaw->update($request->validated());

        return redirect()->route('detail_saw.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DeatailSaw $deatailSaw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, DeatailSaw $deatailSaw)
    {
        $detailSaw->delete();
    }
}
