<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Yajra\DataTables\DataTables;

class JenisMobilDataTable
{
    static public function set($jenis_mobil)
    {
        // 
        return Datatables::of($jenis_mobil)
            ->addColumn('action', function ($jenis_mobil) {
                $deleteUrl = "'" . route('jenis_mobil.destroy', $jenis_mobil->id) . "', 'jenisMobilDatatable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('jenis_mobil.edit', $jenis_mobil->id) . '" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" ><i class="menu-icon fa fa-pencil-alt"></i></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus"><i class="menu-icon fa fa-trash"></i></a>' .
                    '</div>';
            })->addIndexColumn()->rawColumns(['action', 'thumbnail'])->make(true);
    }
}
