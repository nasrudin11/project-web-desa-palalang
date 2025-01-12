<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Homepage

Route::get('/', [IndexController::class, 'index']);


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'authenticate']);

    // Homepage Menu (semua yang bisa diakses tanpa login)
    Route::get('/visi-misi', [IndexController::class, 'indexVisiMisi']);
    Route::get('/sejarah', [IndexController::class, 'indexSejarah']);
    Route::get('/peta-desa', [IndexController::class, 'indexPetaDesa']);
    Route::get('/fasilitas-desa', [IndexController::class, 'indexFasilitas']);

    Route::get('/struktur-organisasi', [IndexController::class, 'indexStruktur']);
    Route::get('/perangkat-desa', [IndexController::class, 'indexPerangkat']);

    Route::get('/foto', [IndexController::class, 'indexFoto']);
    Route::get('/foto-dtl', [IndexController::class, 'indexFotoD']);
    Route::get('/video', [IndexController::class, 'indexVideo']);
    Route::get('/video-dtl', [IndexController::class, 'indexVideoD']);
    Route::get('/berita', [IndexController::class, 'indexBerita']);
    Route::get('/berita-dtl', [IndexController::class, 'indexBeritaD']);
    Route::get('/pengumuman', [IndexController::class, 'indexPengumuman']);
    Route::get('/pengumuman-dtl', [IndexController::class, 'indexPengumumanD']);
    Route::get('/pengaduan', [IndexController::class, 'indexPengaduan']);
});

Route::post('/logout', [LoginController::class, 'logout']);


// Admin Dashboard
Route::middleware('auth')->group(function () {
    
    Route::get('/dashboard-admin', [DashboardController::class, 'index']);

    Route::get('/dashboard-foto',[DashboardController::class, 'dashboardFoto']);
    Route::get('/dashboard-video', [DashboardController::class, 'dashboardVideo']);
    Route::get('/dashboard-berita', [DashboardController::class, 'dashboardBerita']);
    Route::get('/dashboard-pengumuman', [DashboardController::class, 'dashboardPengumuman']);

    Route::get('/dashboard-profile', [DashboardController::class, 'dashboardAdminProfile']);

    Route::get('/dashboard-layouts-homepage', [DashboardController::class, 'dashboardHomepage']);
    Route::get('/dashboard-layouts-profile', [DashboardController::class, 'dashboardProfile']);
    Route::get('/dashboard-layouts-pemerintahan', [DashboardController::class, 'dashboardPemerintahan']);

    Route::get('/dashboard-pengaduan', [DashboardController::class, 'dashboardPengaduan']);
});