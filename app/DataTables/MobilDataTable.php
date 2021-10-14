<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Yajra\DataTables\DataTables;

class MobilDataTable
{
    static public function set($mobil)
    {
        // 
        return Datatables::of($mobil)
            ->editColumn('harga', function($mobil){
                return formatPrice($mobil->harga);
            })

            ->editColumn('thumbnail', function ($mobil) {
                return '<img src="' . asset('images/' . $mobil->thumbnail) . '" alt="" width="100px">';
            })

            ->addColumn('action', function ($mobil) {
                if(userRole() == 'admin'){
                    $deleteUrl = "'" . route('mobil.destroy', $mobil->id) . "', 'mobilDatatable'";
                    return
                        '<div class="btn-group">' .
                        '<a href="' . route('mobil.edit', $mobil->id) . '" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" ><i class="menu-icon fa fa-pencil-alt"></i></a>' .
                        '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus"><i class="menu-icon fa fa-trash"></i></a>' .
                        '</div>';
                }

                return '-';
            })->addIndexColumn()->rawColumns(['action', 'thumbnail'])->make(true);
    }
}
