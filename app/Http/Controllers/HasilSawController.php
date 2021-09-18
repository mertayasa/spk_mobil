<?php

namespace App\Http\Controllers;

use App\Http\Requests\HasilSawControllerStoreRequest;
use App\Http\Requests\HasilSawControllerUpdateRequest;
use App\Models\HasilSaw;
use Illuminate\Http\Request;

class HasilSawController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('hasil_saw.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function datatable(Request $request)
    {
        $hasilSaws = HasilSaw::all();
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('hasil_saw.create');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HasilSaw $hasilSaw
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, HasilSaw $hasilSaw)
    {
        return view('hasil_saw.edit', compact('hasil_saw'));
    }

    /**
     * @param \App\Http\Requests\HasilSawControllerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(HasilSawControllerStoreRequest $request)
    {
        $hasilSaw = HasilSaw::create($request->validated());

        return redirect()->route('hasil_saw.index');
    }

    /**
     * @param \App\Http\Requests\HasilSawControllerUpdateRequest $request
     * @param \App\Models\HasilSaw $hasilSaw
     * @return \Illuminate\Http\Response
     */
    public function update(HasilSawControllerUpdateRequest $request, HasilSaw $hasilSaw)
    {
        $hasilSaw->update($request->validated());

        return redirect()->route('hasil_saw.index');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\HasilSaw $hasilSaw
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, HasilSaw $hasilSaw)
    {
        $hasilSaw->delete();
    }
}
