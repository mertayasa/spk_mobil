<?php

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;

function uploadFile($base_64_foto, $folder)
{
    try {
        $foto = base64_decode($base_64_foto['data']);
        $folderName = 'images/'.$folder;
        
        if (!file_exists($folderName)) {
            mkdir($folderName, 0755, true); 
        }

        // return $folderName;

        $safeName = time() . $base_64_foto['name'];
        $inventoriePath = public_path() . '/' . $folderName;
        file_put_contents($inventoriePath. '/' . $safeName, $foto);
        // return 'fcuk';
    } catch (Exception $e) {
        Log::info($e->getMessage());
        return 0;
    }

    return $folder.'/'.$safeName;
}

function formatPrice($value)
{
    return 'Rp ' . number_format($value, 0, ',', '.');
}

function userRole()
{
    // 3 User
    $role_name = Auth::user()->level == 0 ? 'admin' : (Auth::user()->level == 1 ? 'owner' : 'pelanggan');

    // 2 user
    // $role_name = Auth::user()->level == 0 ? 'admin' : 'user';

    return $role_name;
}

function authUser()
{
    return Auth::user();
}

function indonesianDate($date)
{
    return Carbon::parse($date)->isoFormat('LL');
}

function indonesianDateFrontend($date)
{
    return Carbon::parse($date)->isoFormat('D-MMMM-YYYY');
}

function indonesianDateTime($date)
{
    return Carbon::parse($date)->isoFormat('LL H:mm');
}

function getDateTimeLocal($date_time_local)
{
    $date_time = strtotime($date_time_local);
    $new_date_time = Date('d-m-Y\TH:i', $date_time);
    return $new_date_time;
}

function getAge($date)
{
    $birth_date = Carbon::parse($date);
    $now = Carbon::now();

    return $birth_date->diffInYears($now);
}

function getGender($gender)
{
    return $gender == 0 ? 'Laki-Laki' : 'Perempuan';
}

function getConditions($condition)
{
    return $condition == 0 ? 'Baik' : 'Kurang Baik';
}

function getStatus($active_status)
{
    return $active_status == 0 ? 'Nonaktif' : 'Aktif';
}

function getLevel($level)
{
    return $level == 0 ? '<span>Ketua</span>' : ($level == 1 ? '<span">Sekretaris</span>' : ($level == 2 ? '<span">Bendahara</span>' : '<span">Anggota </span>'));
}

function isActive($param)
{
    // return Request::route()->getPrefix() == '/' . $param ? 'active' : '';
    return Request::segment(1) == $param ? 'active' : '';
}

function searchAvailablity($start_date, $end_date, $mobil)
{
    $search_date_range = CarbonPeriod::create($start_date, $end_date)->toArray();

    $range = [];
    foreach($search_date_range as $date_range){
        array_push($range, $date_range->format('Y-m-d'));
    }

    // return $range;

    $available_mobil = [];

    foreach($mobil as $mob){
        if($mob->isAvailable($range) == 'available'){
            array_push($available_mobil, $mob);
        }
    }

    return $available_mobil;
}

function getStatusBooking($status = null)
{
    $booking_status = ['booking_baru' => 'Booking Baru', 'dikonfirmasi_admin' => 'Dikonfirmasi Admin', 'on_progress' => 'On Progress', 'selesai' => 'Selesai'];

    if($status == null){
        return $booking_status;
    }else{
        return $booking_status[$status];
    }
}

function getStatusSopir($status_sopir)
{
    if($status_sopir == 'ya'){
        return '<span class="text-success">Dengan Sopir</span>';
    }

    return '<span class="text-danger">Tanpa Sopir</span>';
}

function getStatusPengambilan($status_pengambilan)
{
    if($status_pengambilan == 'diantar'){
        return '<span class="text-success">Diantar</span>';
    }

    return '<span class="text-danger">Ambil Sendiri</span>';

}

function getNamaSopir($status_sopir, $booking)
{
    if($status_sopir == 'ya'){
        if($booking->sopir){
            return $booking->sopir->nama;
        }

        return '<span class="text-danger">Sopir Belum Ditentukan</span>';
    }else{
        return '-';
    }
}