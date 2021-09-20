<?php

namespace App\Http\Controllers;

use App\DataTables\SopirDataTable;
use App\Http\Requests\SopirStoreRequest;
use App\Http\Requests\SopirUpdateRequest;
use App\Models\Sopir;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

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
        $sopir = Sopir::all();
        
        return SopirDataTable::set($sopir);
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
     * @param \App\Http\Requests\SopirStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(SopirStoreRequest $request)
    {
        try{
            $data = $request->all();
            $base_64_foto = json_decode($request['photo'], true);
            $upload_image = uploadFile($base_64_foto);
            if ($upload_image == 0) {
                return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
            }
    
            $data['photo'] = $upload_image;
    
            Sopir::create($data);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data sopir');
        }

        return redirect()->route('sopir.index')->with('success', 'Berhasil menambahkan data sopir');
    }

    /**
     * @param \App\Http\Requests\SopirUpdateRequest $request
     * @param \App\Models\Sopir $sopir
     * @return \Illuminate\Http\Response
     */
    public function update(SopirUpdateRequest $request, Sopir $sopir)
    {

        try{
            $data = $request->all();
    
            $base_64_foto = json_decode($request['photo'], true);
            $upload_image = uploadFile($base_64_foto);
            if ($upload_image == 0) {
                return redirect()->back()->withInput()->with('error', 'Gagal mengupload gambar!');
            }
    
            $data['photo'] = $upload_image;
    
            $sopir->update($data);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data sopir');
        }

        return redirect()->route('sopir.index')->with('success', 'Berhasil menambahkan data sopir');
        
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Sopir $sopir
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Sopir $sopir)
    {
        try {
            if($sopir->booking->count() > 0){
                return response(['code' => 0, 'message' => 'Gagal menghapus data jenis sopir, data masih digunakan di tabel booking']);
            }

            $sopir->delete();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data sopir']);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data sopir']);
    }
}
