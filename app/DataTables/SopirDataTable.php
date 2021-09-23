<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Yajra\DataTables\DataTables;

class SopirDataTable
{
    static public function set($sopir)
    {
        // 
        return Datatables::of($sopir)
            ->editColumn('photo', function ($sopir) {
                return '<img src="' . asset('images/' . $sopir->photo) . '" alt="" width="100px">';
            })

            ->addColumn('action', function ($sopir) {
                $deleteUrl = "'" . route('sopir.destroy', $sopir->id) . "', 'sopirDatatable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('sopir.edit', $sopir->id) . '" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" ><i class="menu-icon fa fa-pencil-alt"></i></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus"><i class="menu-icon fa fa-trash"></i></a>' .
                    '</div>';
            })->addIndexColumn()->rawColumns(['action', 'photo'])->make(true);
    }
}
