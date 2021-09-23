<?php

use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\JenisMobilController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\SopirController;
use App\Http\Controllers\SubKriteriaController;
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

Route::get('/', [HomepageController::class, 'index'])->name('homepage');

Route::middleware(['auth'])->group(function () {
    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard.'], function () {
        Route::get('/', [DashboardController::class, 'index'])->name('index');
    });
    
    Route::group(['prefix' => 'mobil', 'as' => 'mobil.'], function () {
        Route::get('/', [MobilController::class, 'index'])->name('index');
        Route::get('create', [MobilController::class, 'create'])->name('create');
        Route::post('store', [MobilController::class, 'store'])->name('store');
        Route::get('edit/{mobil}', [MobilController::class, 'edit'])->name('edit');
        Route::patch('update/{mobil}', [MobilController::class, 'update'])->name('update');
        Route::delete('destroy/{mobil}', [MobilController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [MobilController::class, 'datatable'])->name('datatable');
    });
    
    Route::group(['prefix' => 'jenis-mobil', 'as' => 'jenis_mobil.'], function () {
        Route::get('/', [JenisMobilController::class, 'index'])->name('index');
        Route::get('create', [JenisMobilController::class, 'create'])->name('create');
        Route::post('store', [JenisMobilController::class, 'store'])->name('store');
        Route::get('edit/{jenis_mobil}', [JenisMobilController::class, 'edit'])->name('edit');
        Route::patch('update/{jenis_mobil}', [JenisMobilController::class, 'update'])->name('update');
        Route::delete('destroy/{jenis_mobil}', [JenisMobilController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [JenisMobilController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'sopir', 'as' => 'sopir.'], function () {
        Route::get('/', [SopirController::class, 'index'])->name('index');
        Route::get('create', [SopirController::class, 'create'])->name('create');
        Route::post('store', [SopirController::class, 'store'])->name('store');
        Route::get('edit/{sopir}', [SopirController::class, 'edit'])->name('edit');
        Route::patch('update/{sopir}', [SopirController::class, 'update'])->name('update');
        Route::delete('destroy/{sopir}', [SopirController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [SopirController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'kriteria', 'as' => 'kriteria.'], function () {
        Route::get('/', [KriteriaController::class, 'index'])->name('index');
        Route::get('create', [KriteriaController::class, 'create'])->name('create');
        Route::post('store', [KriteriaController::class, 'store'])->name('store');
        Route::get('edit/{kriteria}', [KriteriaController::class, 'edit'])->name('edit');
        Route::patch('update/{kriteria}', [KriteriaController::class, 'update'])->name('update');
        Route::delete('destroy/{kriteria}', [KriteriaController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [KriteriaController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'sub_kriteria', 'as' => 'sub_kriteria.'], function () {
        Route::get('/', [SubKriteriaController::class, 'index'])->name('index');
        Route::get('create', [SubKriteriaController::class, 'create'])->name('create');
        Route::post('store', [SubKriteriaController::class, 'store'])->name('store');
        Route::get('edit/{sub_kriteria}', [SubKriteriaController::class, 'edit'])->name('edit');
        Route::patch('update/{sub_kriteria}', [SubKriteriaController::class, 'update'])->name('update');
        Route::delete('destroy/{sub_kriteria}', [SubKriteriaController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [SubKriteriaController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::patch('update/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [UserController::class, 'datatable'])->name('datatable');
    });

    Route::group(['prefix' => 'booking', 'as' => 'booking.'], function () {
        Route::get('/', [BookingController::class, 'index'])->name('index');
        Route::get('create', [BookingController::class, 'create'])->name('create');
        Route::post('store', [BookingController::class, 'store'])->name('store');
        Route::get('show/{booking}', [BookingController::class, 'show'])->name('show');
        Route::get('edit/{booking}', [BookingController::class, 'edit'])->name('edit');
        Route::patch('update/{booking}', [BookingController::class, 'update'])->name('update');
        Route::delete('destroy/{booking}', [BookingController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [BookingController::class, 'datatable'])->name('datatable');
    });

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');