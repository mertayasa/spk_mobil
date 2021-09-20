<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisMobil extends Model
{
    use HasFactory;

    protected $table = "jenis_mobil";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'jenis_mobil',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];


    public function mobil()
    {
        return $this->hasMany(\App\Models\Mobil::class, 'id_jenis_mobil');
    }
}
