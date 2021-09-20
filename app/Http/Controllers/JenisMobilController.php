<?php

namespace App\Http\Controllers;

use App\DataTables\JenisMobilDataTable;
use App\Http\Requests\JenisMobilStoreRequest;
use App\Http\Requests\JenisMobilUpdateRequest;
use App\Models\JenisMobil;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $jenis_mobil = JenisMobil::all();

        return JenisMobilDataTable::set($jenis_mobil);
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
     * @param \App\Models\JenisMobil $jenis_mobil
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, JenisMobil $jenis_mobil)
    {
        return view('jenis_mobil.edit', compact('jenis_mobil'));
    }

    /**
     * @param \App\Http\Requests\JenisMobilStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(JenisMobilStoreRequest $request)
    {
        try{
            JenisMobil::create($request->validated());
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data jenis mobil');
        }

        return redirect()->route('jenis_mobil.index')->with('success', 'Berhasil menambahkan data jenis mobil');
    }

    /**
     * @param \App\Http\Requests\JenisMobilUpdateRequest $request
     * @param \App\Models\JenisMobil $jenis_mobil
     * @return \Illuminate\Http\Response
     */
    public function update(JenisMobilUpdateRequest $request, JenisMobil $jenis_mobil)
    {
        try{
            $jenis_mobil->update($request->validated());
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data jenis mobil');
        }

        return redirect()->route('jenis_mobil.index')->with('success', 'Berhasil menambahkan data jenis mobil');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\JenisMobil $jenis_mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, JenisMobil $jenis_mobil)
    {
        try {
            if($jenis_mobil->mobil->count() > 0){
                return response(['code' => 0, 'message' => 'Gagal menghapus data jenis mobil, data masih digunakan di tabel mobil']);
            }

            $jenis_mobil->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data jenis mobil']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data jenis mobil']);
    }
}
