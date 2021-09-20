<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;

    protected $table = 'mobil';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'id_jenis_mobil',
        'deskripsi',
        'jumlah_kursi',
        'harga',
        'thumbnail'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_jenis_mobil' => 'integer',
    ];


    public function jenisMobil()
    {
        return $this->belongsTo(\App\Models\JenisMobil::class, 'id_jenis_mobil');
    }

    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class);
    }

    public function hasilSaw()
    {
        return $this->hasOne(\App\Models\HasilSaw::class);
    }
}
