<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailSaw extends Model
{
    use HasFactory;

    protected $table = 'detail_saw';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_hasil_saw',
        'id_kriteria',
        'id_sub_kriteria',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_hasil_saw' => 'integer',
        'id_kriteria' => 'integer',
        'id_sub_kriteria' => 'integer',
    ];

    public function kriteria()
    {
        return $this->belongsTo(\App\Models\Kriteria::class);
    }

    public function subKriteria()
    {
        return $this->belongsTo(\App\Models\SubKriteria::class, 'id_sub_kriteria');
    }
}
