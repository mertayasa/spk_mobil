<?php

namespace App\Http\Controllers;

use App\DataTables\KriteriaDataTable;
use App\Http\Requests\KriteriaStoreRequest;
use App\Http\Requests\KriteriaUpdateRequest;
use App\Models\Kriteria;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $kriteria = Kriteria::all();

        return KriteriaDataTable::set($kriteria);
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
     * @param \App\Models\Kriteria $kriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Kriteria $kriteria)
    {
        return view('kriteria.edit', compact('kriteria'));
    }

    /**
     * @param \App\Http\Requests\KriteriaStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(KriteriaStoreRequest $request)
    {
        try{
            Kriteria::create($request->validated());
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data kriteria');
        }

        return redirect()->route('kriteria.index')->with('success', 'Berhasil menambahkan data kriteria');
    }

    /**
     * @param \App\Http\Requests\KriteriaUpdateRequest $request
     * @param \App\Models\Kriteria $kriteria
     * @return \Illuminate\Http\Response
     */
    public function update(KriteriaUpdateRequest $request, Kriteria $kriteria)
    {
        try{
            $kriteria->update($request->validated());
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah data kriteria');
        }

        return redirect()->route('kriteria.index')->with('success', 'Berhasil mengubah data kriteria');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Kriteria $kriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Kriteria $kriteria)
    {
        $kriteria->delete();
    }
}
