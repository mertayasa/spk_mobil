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

    protected $with = [
        'jenisMobil'
    ];

    public function jenisMobil()
    {
        return $this->belongsTo(\App\Models\JenisMobil::class, 'id_jenis_mobil');
    }

    public function bookings()
    {
        return $this->hasMany(\App\Models\Booking::class, 'id_mobil');
    }

    public function getBookedDateAttribute()
    {
        $date_range = $this->bookings->pluck('date_range');
        $new_date_range = [];
        foreach($date_range as $range){
            foreach($range as $ran){
                array_push($new_date_range, $ran);
            }
        }

        return $new_date_range;
    }

    public function isAvailable($date)
    {
        $date_range = $this->bookings->pluck('date_range');
        $new_date_range = [];
        foreach($date_range as $range){
            foreach($range as $ran){
                array_push($new_date_range, $ran);
            }
        }

        foreach($date as $range){
            if(array_search($range, $new_date_range)){
                return 'not_available';
            }
        }

        return 'available';
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
        $hasil_saw = HasilSaw::with('detailSaw', 'detailSaw.subKriteria')->where('id_mobil', $id_mobil)->first();

        if($hasil_saw->count() == 0){
            return null;
        }

        $detail = $hasil_saw->detailSaw()->with('subKriteria')->where('id_kriteria', $id_kriteria)->first();

        return $detail->subKriteria->sub_kriteria;
    }
}
