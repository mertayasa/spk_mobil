<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $table = 'booking';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_mobil',
        'id_user',
        'id_sopir',
        'deskripsi',
        'harga',
        'tgl_mulai_sewa',
        'tgl_akhir_sewa',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_mobil' => 'integer',
        'id_user' => 'integer',
        'id_sopir' => 'integer',
        'tgl_mulai_sewa' => 'date',
        'tgl_akhir_sewa' => 'date',
    ];


    public function mobil()
    {
        return $this->belongsTo(\App\Models\Mobil::class);
    }

    public function idMobil()
    {
        return $this->belongsTo(\App\Models\Mobil::class);
    }

    public function idUser()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function idSopir()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function users()
    {
        return $this->hasMany(\App\Models\User::class);
    }
}
