<?php

namespace App\DataTables;

use App\Models\SubKriteria;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Services\DataTable;

class SubKriteriaDataTable extends DataTable
{
    // static public function set($sub_kriteria)
    // {
    //     // 
    //     return Datatables::of($sub_kriteria)
    //         ->editColumn('id_kriteria', function($sub_kriteria){
    //             return $sub_kriteria->kriteria->kriteria;
    //         })
    //         ->addColumn('action', function ($sub_kriteria) {
    //             return 'action';
    //             // $deleteUrl = "'" . route('kriteria.destroy', $sub_kriteria->id) . "', 'kriteriaDatatable'";
    //             // return
    //             //     '<div class="btn-group">' .
    //             //     '<a href="' . route('kriteria.edit', $sub_kriteria->id) . '" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" ><i class="menu-icon fa fa-pencil-alt"></i></a>' .
    //             //     '<a href="#" onclick="deleteModel(' . $deleteUrl . ',)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus"><i class="menu-icon fa fa-trash"></i></a>' .
    //             //     '</div>';
    //         })->addIndexColumn()->rawColumns(['action', 'thumbnail'])->make(true)
    //         ->parameters([
    //             'rowGroup'=> [
    //                 'dataSrc' => ['id_kriteria'],
    //             ],
    //         ]);
            
    // }

    public function dataTable($query){
        return datatables()
            ->eloquent($query)
            ->addColumn('action', function ($query) {
                if(userRole() == 'admin'){
                    $deleteUrl = "'" . route('sub_kriteria.destroy', $query) . "', 'subKriteriaDatatable', 'sub kriteria'";
                    return
                        '<div class="btn-group">' .
                        '<a href="' . route('sub_kriteria.edit', $query) . '" class="btn btn-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Edit" ><i class="menu-icon fa fa-pencil-alt"></i></a>' .
                        '<a href="#" onclick="deleteModelSub(' . $deleteUrl . ',)" class="btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Hapus"><i class="menu-icon fa fa-trash"></i></a>' .
                        '</div>';
                }

                return '-';
            });
            // ->addIndexColumn();
            // ->addColumn('action', 'sub_kriteria.datatables_action');
    }

    public function query(SubKriteria $model){
        return SubKriteria::select('sub_kriteria.*');
    }

    public function html(){
        return $this->builder()
                    // ->addIndex()
                    ->searching(false)
                    ->setTableId('subKriteriaDatatable')
                    ->columns($this->getColumns())
                    ->addAction(['title' => 'Aksi', 'width' => '150px', 'printable' => false, 'responsivePriority' => '100', 'id' => 'actionColumn'])
                    ->minifiedAjax()
                    ->orderBy(0, 'DESC')
                    ->parameters([
                        'rowGroup'=> [
                            'dataSrc' => ['kriteria.kriteria'],
                        ],
                    ]);
    }

    protected function getColumns(){
        $columns = [
            [
                'data' =>  'kriteria.kriteria',
                'name' =>  'kriteria.kriteria',
                'visible' =>  false
            ],
            [
                'data' =>  'kriteria.kriteria',
                'name' =>  'kriteria.kriteria',
                'title' => 'Kriteria',
                'orderable' => false
            ],
            [
                'data' =>  'sub_kriteria',
                'name' =>  'sub_kriteria',
                'title' => 'Sub Kriteria',
                'orderable' => false
            ],
            [
                'data' =>  'skor',
                'name' =>  'skor',
                'title' => 'Skor',
                'orderable' => false
            ],
        ];

        return $columns;
    }
}
