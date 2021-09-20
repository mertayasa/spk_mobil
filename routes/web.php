<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MobilController;
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
    return view('welcome');
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

});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');