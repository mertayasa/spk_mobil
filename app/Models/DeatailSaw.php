<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeatailSaw extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_hasil_saw',
        'id_kriteria',
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
    ];


    public function hasilSaw()
    {
        return $this->belongsTo(\App\Models\HasilSaw::class);
    }

    public function kriteria()
    {
        return $this->belongsTo(\App\Models\Kriteria::class);
    }

    public function idHasilSaw()
    {
        return $this->belongsTo(\App\Models\HasilSaw::class);
    }

    public function idKriteria()
    {
        return $this->belongsTo(\App\Models\Kriteria::class);
    }
}
