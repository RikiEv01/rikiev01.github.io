<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\SekolahController;
use App\Http\Controllers\Admin\MonitoringController;
use App\Http\Controllers\Admin\DashboardController;
use App\Models\Sekolah;




Route::get('/', function () {
    $sekolahs = Sekolah::all();
    return view('landing', compact('sekolahs'));
});

Auth::routes();

// Route untuk halaman dashboard Admin (Home)
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Tambahkan route berikut untuk halaman form input perhitungan pengguna
Route::get('/perhitungan', [UserController::class, 'index'])->name('user.index');


Route::get('/perhitungan', [UserController::class, 'index'])->name('user.index');
Route::post('/hitung', [UserController::class, 'hitung'])->name('user.hitung');

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::resource('sekolahs', SekolahController::class);
    Route::get('/monitoring', [MonitoringController::class, 'index'])->name('monitoring.index');

    Route::get('sekolahs/import', [SekolahController::class, 'showImportForm'])->name('sekolahs.import.form');
    Route::post('sekolahs/import', [SekolahController::class, 'import'])->name('sekolahs.import');

    Route::get('monitoring/export/pdf', [MonitoringController::class, 'exportPdf'])->name('monitoring.export.pdf');
    Route::get('monitoring/export/excel', [MonitoringController::class, 'exportExcel'])->name('monitoring.export.excel');

    Route::get('monitoring/statistik', [MonitoringController::class, 'statistik'])->name('monitoring.statistik');
 
});

Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

