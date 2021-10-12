<?php

namespace App\Models;

use Carbon\Carbon;
use Carbon\CarbonPeriod;
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
    ];

    protected $with = [
        'mobil', 'sopir', 'user'
    ];


    public function mobil()
    {
        return $this->belongsTo(\App\Models\Mobil::class, 'id_mobil');
    }

    public function sopir()
    {
        return $this->belongsTo(\App\Models\Sopir::class, 'id_sopir');
    }

    public function getDateRangeAttribute()
    {
        // if(!$this->attributes['tgl_akhir_sewa'] <= Carbon::now()->format('Y-m-d')){
        //     return [];
        // }

        $period = CarbonPeriod::create($this->attributes['tgl_mulai_sewa'], $this->attributes['tgl_akhir_sewa'])->toArray();
        $new_period = [];
        
        foreach($period as $per){
            array_push($new_period, $per->format('Y-m-d'));
        }

        return $new_period;
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'id_user');
    }
}
