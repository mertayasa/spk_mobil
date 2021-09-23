<?php

namespace App\DataTables;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Yajra\DataTables\DataTables;

class UserDataTable
{
    static public function set($user)
    {
        // 
        return Datatables::of($user)
            ->editColumn('photo', function ($user) {
                return '<img src="' . asset('images/' . $user->photo) . '" alt="" width="100px">';
            })
            
            ->editColumn('status_aktif', function ($user) {
                return $user->status_aktif == 0 ? 'Tidak Aktif' : 'Aktif';
            })

            ->editColumn('jenis_kelamin', function ($user) {
                return $user->status_aktif == 0 ? 'Laki-Laki' : 'Perempuan';
            })

            ->addColumn('action', function ($user) {
                $deleteUrl = "'" . route('user.destroy', $user->id) . "', 'userDatatable'";
                return
                    '<div class="btn-group">' .
                    '<a href="' . route('user.edit', $user->id) . '" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" ><i class="menu-icon fa fa-pencil-alt"></i></a>' .
                    '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus"><i class="menu-icon fa fa-trash"></i></a>' .
                    '</div>';
            })->addIndexColumn()->rawColumns(['action', 'photo'])->make(true);
    }
}
