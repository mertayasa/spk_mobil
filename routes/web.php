<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JenisMobilController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MobilController;
use App\Http\Controllers\SopirController;
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
    // return redirect('/login');
    return view('welcome2');
});

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

    Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('create', [UserController::class, 'create'])->name('create');
        Route::post('store', [UserController::class, 'store'])->name('store');
        Route::get('edit/{user}', [UserController::class, 'edit'])->name('edit');
        Route::patch('update/{user}', [UserController::class, 'update'])->name('update');
        Route::delete('destroy/{user}', [UserController::class, 'destroy'])->name('destroy');
        Route::get('datatable', [UserController::class, 'datatable'])->name('datatable');
    });

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');