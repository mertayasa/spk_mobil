<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kriteria',
        'id_kriteria',
        'sub_kriteria',
        'skor',
        'sifat',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_kriteria' => 'integer',
        'sifat' => 'integer',
    ];


    public function kriteria()
    {
        return $this->belongsTo(\App\Models\Kriteria::class);
    }

    public function idKriteria()
    {
        return $this->belongsTo(\App\Models\Kriteria::class);
    }
}
