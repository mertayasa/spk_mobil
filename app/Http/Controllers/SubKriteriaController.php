<?php

namespace App\Http\Controllers;

use App\DataTables\SubKriteriaDataTable;
use App\Http\Requests\SubKriteriaStoreRequest;
use App\Http\Requests\SubKriteriaUpdateRequest;
use App\Models\Kriteria;
use App\Models\SubKriteria;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SubKriteriaController extends Controller
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function index(SubKriteriaDataTable $subKriteriaDataTable)
    {
        $is_same = $this->checkSubKriteriaLength();
        // dd($is_same);

        // SubKriteria::all()->dd();
        
        return $subKriteriaDataTable->render('sub_kriteria.index', compact('is_same'));
    }

    public function checkSubKriteriaLength()
    {
        $sub_kriteria = DB::table('sub_kriteria')
                 ->select(DB::raw('count(*) as total'))
                 ->groupBy('id_kriteria')
                 ->get();

        foreach($sub_kriteria as $key => $sub){
            if($sub->total != $sub_kriteria[0]->total){
                return false;
            }
        }

        return true;
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function datatable(Request $request)
    {
        $subKriteria = SubKriteria::all();

        // return SubKriteriaDataTable::set($subKriteria);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $kriteria = Kriteria::all();

        return view('sub_kriteria.create', compact('kriteria'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SubKriteria $subKriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, SubKriteria $sub_kriteria)
    {
        return view('sub_kriteria.edit', compact('sub_kriteria'));
    }

    /**
     * @param \App\Http\Requests\SubKriteriaStoreRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $new_sub = $request->all();
        unset($new_sub['_token']);
        unset($new_sub['/sub-kriteria/store']);
        
        try{
            $asd = [];
            foreach($new_sub as $sub){
                if(!in_array(null, $sub, true)){
                    SubKriteria::create($sub);
                }
            }
            
        }catch(Exception $e){
            Log::info($e->getMessage());
            dd($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal menambahkan data sub kriteria');
        }

        return redirect()->route('sub_kriteria.index')->with('success', 'Berhasil menambahkan data sub kriteria');
    }

    /**
     * @param \App\Http\Requests\SubKriteriaUpdateRequest $request
     * @param \App\Models\SubKriteria $subKriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubKriteria $subKriteria)
    {
        $data = $request->all();

        try{
            $subKriteria->update($data);
        }catch(Exception $e){
            Log::info($e->getMessage());
            return redirect()->back()->withInput()->with('error', 'Gagal mengubah data sub kriteria');
        }

        return redirect()->route('sub_kriteria.index')->with('success', 'Berhasil mengubah data sub kriteria');
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\SubKriteria $subKriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, SubKriteria $subKriteria)
    {
        
        try {
            $subKriteria->delete();

            $is_same = $this->checkSubKriteriaLength();
        } catch (Exception $e) {
            Log::info($e->getMessage());
            return response(['code' => 0, 'message' => 'Gagal menghapus data sopir', 'is_same' => $is_same]);
        }

        return response(['code' => 1, 'message' => 'Berhasil menghapus data sopir', 'is_same' => $is_same]);
    }
}
