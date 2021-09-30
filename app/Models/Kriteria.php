<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table = 'kriteria';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'kriteria',
        'bobot',
        'sifat',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'bobot' => 'float',
    ];


    public function subKriteria()
    {
        return $this->hasMany(\App\Models\SubKriteria::class, 'id_kriteria');
    }

    public function detailSaws()
    {
        return $this->hasMany(\App\Models\DetailSaw::class);
    }
}
