<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubKriteria extends Model
{
    use HasFactory;

    protected $table = 'sub_kriteria';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_kriteria',
        'sub_kriteria',
        'skor',
    ];

    protected $with = [
        'kriteria'
    ];

    public function kriteria()
    {
        return $this->belongsTo(\App\Models\Kriteria::class, 'id_kriteria');
    }

}
