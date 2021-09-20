<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sopir extends Model
{
    use HasFactory;

    protected $table = 'sopir';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama',
        'telpon',
        'alamat',
        'tempat_lahir',
        'tanggal_lahir',
        'photo',
        'no_ktp',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];


    public function booking()
    {
        return $this->hasMany(\App\Models\Booking::class, 'id_sopir');
    }
}
