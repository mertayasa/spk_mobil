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
        return $this->hasMany(\App\Models\Booking::class, 'id_mobil');
    }

    public function hasilSaw()
    {
        return $this->hasOne(\App\Models\HasilSaw::class, 'id_mobil');
    }

    public function detailSaw()
    {
        return $this->hasManyThrough(DetailSaw::class, HasilSaw::class, 'id_mobil', 'id_hasil_saw');
    }

    public function getSawAttribute()
    {
        $sub = $this->detailSaw->pluck('id_sub_kriteria', 'id_kriteria')->toArray();
        $new_sub = ['id_mobil' => $this->attributes['id']] + $sub;

        return $new_sub;
        return [$this->attributes['id'] =>  $this->detailSaw->pluck('id_sub_kriteria', 'id_kriteria')->toArray()];
        // return $data;
        // return $this->detailSaw->pluck('id_sub_kriteria', 'id_kriteria');
    }

    public function findKriteriaAndSub($id_mobil, $id_kriteria)
    {
        $hasil_saw = HasilSaw::with('detailSaw')->where('id_mobil', $id_mobil)->get();

        if($hasil_saw->count() == 0){
            return null;
        }

        $detail = $hasil_saw[0]->detailSaw()->where('id_kriteria', $id_kriteria)->get();

        return $detail[0]->id_sub_kriteria;
    }
}
