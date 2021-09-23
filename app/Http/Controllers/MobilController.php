<?php

namespace App\Http\Controllers;

use App\DataTables\MobilDataTable;
use App\Http\Requests\MobilStoreRequest;
use App\Http\Requests\MobilUpdateRequest;
use App\Models\JenisMobil;
use App\Models\Mobil;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $mobil = Mobil::with('jenisMobil')->get();

        return MobilDataTable::set($mobil);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $jenis_mobil = JenisMobil::pluck('jenis_mobil', 'id');
        return view('mobil.create', compact('jenis_mobil'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Mobil $mobil
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Mobil $mobil)
    {
        $jenis_mobil = JenisMobil::pluck('jenis_mobil', 'id');
        return view('mobil.edit', compact('mobil', 'jenis_mobil'));
    }

    /**
     * @param \App\Http\Requests\MobilControllerStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MobilStoreRequest $request)
    {
        // dd($request->all());
        try{
            $data = $request->all();
    
            $base_64_foto = json_decode($request['thumbnail'], true);
            $upload_image = uploadFile($base_64_foto, 'mobil');
            if ($upload_image === 0) {
                return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
            }
    
            $data['thumbnail'] = $upload_image;
    
            Mobil::create($data);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data mobil');
        }

        return redirect()->route('mobil.index')->with('success', 'Berhasil menambahkan data mobil');
    }

    /**
     * @param \App\Http\Requests\MobilControllerUpdateRequest $request
     * @param \App\Models\Mobil $mobil
     * @return \Illuminate\Http\Response
     */
    public function update(MobilUpdateRequest $request, Mobil $mobil)
    {
        try{
            $data = $request->all();
            $base_64_foto = json_decode($request['thumbnail'], true);
            $upload_image = uploadFile($base_64_foto, 'mobil');
            if ($upload_image === 0) {
                return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
            }
    
            $data['thumbnail'] = $upload_image;
    
            $mobil->update($data);

        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah data mobil');
        }

        return redirect()->route('mobil.index')->with('success', 'Berhasil mengubah data mobil');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Mobil $mobil
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Mobil $mobil)
    {
        try {
            $mobil->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data mobil']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data mobil']);
    }
}
