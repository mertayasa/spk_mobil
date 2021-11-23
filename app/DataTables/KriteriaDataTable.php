<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Yajra\DataTables\DataTables;

class KriteriaDataTable
{
    static public function set($kriteria)
    {
        // 
        return Datatables::of($kriteria)
            ->editColumn('sifat', function($kriteria){
                if($kriteria->sifat){
                    return ucfirst($kriteria->sifat);
                }

                return '-';
            })
            ->addColumn('action', function ($kriteria) {
                if(userRole() == 'admin'){
                    $deleteUrl = "'" . route('kriteria.destroy', $kriteria->id) . "', 'kriteriaDatatable'";
                    return
                        '<div class="btn-group">' .
                        '<a href="' . route('kriteria.edit', $kriteria->id) . '" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" ><i class="menu-icon fa fa-pencil-alt"></i></a>' .
                        '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus"><i class="menu-icon fa fa-trash"></i></a>' .
                        '</div>';
                }

                return '-';
            })->addIndexColumn()->rawColumns(['action', 'thumbnail'])->make(true);
    }
}
