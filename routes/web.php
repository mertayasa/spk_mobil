<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/login');
    // return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('jenis-mobil/datatable', [App\Http\Controllers\JenisMobilController::class, 'datatable']);
Route::resource('jenis-mobil', App\Http\Controllers\JenisMobilController::class)->except('show');


Route::get('mobil/datatable', [App\Http\Controllers\MobilController::class, 'datatable']);
Route::resource('mobil', App\Http\Controllers\MobilController::class)->except('show');


Route::get('jenis-mobil/datatable', [App\Http\Controllers\JenisMobilController::class, 'datatable']);
Route::resource('jenis-mobil', App\Http\Controllers\JenisMobilController::class)->except('show');


Route::get('mobil/datatable', [App\Http\Controllers\MobilController::class, 'datatable']);
Route::resource('mobil', App\Http\Controllers\MobilController::class)->except('show');


Route::get('booking/datatable', [App\Http\Controllers\BookingController::class, 'datatable']);
Route::resource('booking', App\Http\Controllers\BookingController::class)->except('show');


Route::get('booking/datatable', [App\Http\Controllers\BookingController::class, 'datatable']);
Route::resource('booking', App\Http\Controllers\BookingController::class)->except('show');


Route::get('kriteria/datatable', [App\Http\Controllers\KriteriaController::class, 'datatable']);
Route::resource('kriteria', App\Http\Controllers\KriteriaController::class)->except('show');


Route::get('sub-kriteria/datatable', [App\Http\Controllers\SubKriteriaController::class, 'datatable']);
Route::resource('sub-kriteria', App\Http\Controllers\SubKriteriaController::class)->except('show');


Route::get('sopir/datatable', [App\Http\Controllers\SopirController::class, 'datatable']);
Route::resource('sopir', App\Http\Controllers\SopirController::class)->except('show');


Route::get('hasil-saw/datatable', [App\Http\Controllers\HasilSawController::class, 'datatable']);
Route::resource('hasil-saw', App\Http\Controllers\HasilSawController::class)->except('show');


Route::get('deatail-saw/datatable', [App\Http\Controllers\DeatailSawController::class, 'datatable']);
Route::resource('deatail-saw', App\Http\Controllers\DeatailSawController::class)->except('show');
