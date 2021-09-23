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
                return $kriteria->sifat == 0 ? 'Benefit' : 'Cost';
            })
            ->addColumn('action', function ($kriteria) {
                $deleteUrl = "'" . route('kriteria.destroy', $kriteria->id) . "', 'kriteriaDatatable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('kriteria.edit', $kriteria->id) . '" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" ><i class="menu-icon fa fa-pencil-alt"></i></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus"><i class="menu-icon fa fa-trash"></i></a>' .
                    '</div>';
            })->addIndexColumn()->rawColumns(['action', 'thumbnail'])->make(true);
    }
}
