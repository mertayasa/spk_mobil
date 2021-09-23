<?php

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
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
    $role_name = Auth::user()->level == 0 ? 'Admin' : (Auth::user()->level == 1 ? 'Sekretaris' : (Auth::user()->level == 2 ? 'Bendahara' : 'Anggota'));

    // 2 user
    // $role_name = Auth::user()->level == 0 ? 'role1' : 'role2';

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
