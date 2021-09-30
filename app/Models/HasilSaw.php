<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilSaw extends Model
{
    use HasFactory;

    protected $table = 'hasil_saw';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kriteria',
        'id_mobil',
        'nilai_akhir',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_mobil' => 'integer',
        'nilai_akhir' => 'float',
    ];


    public function mobil()
    {
        return $this->belongsTo(\App\Models\Mobil::class, 'id_mobil');
    }

    public function detailSaw()
    {
        return $this->hasMany(\App\Models\DetailSaw::class, 'id_hasil_saw');
    }
}
