<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PemerintahanController;
use App\Http\Controllers\ProfilDesaController;
use App\Http\Controllers\PublikasiController;
use App\Http\Controllers\UserController;
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
    Route::get('/foto-dtl/{id}', [IndexController::class, 'indexFotoD']);
    Route::get('/video', [IndexController::class, 'indexVideo']);
    Route::get('/video-dtl/{id}', [IndexController::class, 'indexVideoD']);

    Route::get('/pengumuman', [IndexController::class, 'indexPengumuman']);
    Route::get('/pengumuman-dtl/{id}', [IndexController::class, 'indexPengumumanD']);
    Route::get('/pengaduan', [IndexController::class, 'indexPengaduan']);
});

Route::get('/berita', [IndexController::class, 'indexBerita']);
Route::get('/berita-dtl/{id}', [IndexController::class, 'indexBeritaD']);

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
    Route::get('/dashboard-pengaduan-dtl', [DashboardController::class, 'dashboardPengaduanDtl']);

    
    Route::put('/edit-profile', [UserController::class, 'updateProfile']);
    Route::put('/update-password', [UserController::class, 'updatePassword']);

    Route::put('/edit-navbar', [HomepageController::class, 'editNavbar']);
    Route::put('/edit-banner', [HomepageController::class, 'editBanner']);
    Route::put('/edit-konten', [HomepageController::class, 'editKonten']);
    Route::post('/edit-footer', [HomepageController::class, 'editFooter']);

    Route::put('/update-visi-misi', [ProfilDesaController::class, 'updateVisiMisi']);
    Route::put('/update-sejarah', [ProfilDesaController::class, 'updateSejarah']);
    Route::put('/update-peta-desa', [ProfilDesaController::class, 'updatePetaDesa']);

    Route::post('/store-fasilitas', [ProfilDesaController::class, 'storeFasilitas']);
    Route::put('/edit-fasilitas/{id}', [ProfilDesaController::class, 'updateFasilitas']);
    Route::delete('/delete-fasilitas/{id}', [ProfilDesaController::class, 'deleteFasilitas']);

    Route::put('/update-struktur', [PemerintahanController::class, 'updateStruktur']);

    Route::post('/store-perangkat-desa', [PemerintahanController::class, 'storePerangkatDesa']);
    Route::post('/edit-perangkat-desa/{id}', [PemerintahanController::class, 'editPerangkatDesa']);
    Route::delete('/delete-perangkat-desa/{id}', [PemerintahanController::class, 'deletePerangkatDesa']);

    Route::post('/store-foto', [PublikasiController::class, 'storeFoto']);
    Route::put('/edit-foto/{id}', [PublikasiController::class, 'editFoto']);
    Route::delete('/delete-foto/{id}', [PublikasiController::class, 'deleteFoto']);

    Route::post('/store-video', [PublikasiController::class, 'storeVideo']);
    Route::put('/edit-video/{id}', [PublikasiController::class, 'editVideo']);
    Route::delete('/delete-video/{id}', [PublikasiController::class, 'deleteVideo']);

    Route::post('/store-berita', [PublikasiController::class, 'storeBerita']);
    Route::put('/edit-berita/{id}', [PublikasiController::class, 'editBerita']);
    Route::delete('/delete-berita/{id}', [PublikasiController::class, 'deleteBerita']);

    Route::post('/store-pengumuman', [PublikasiController::class, 'storePengumuman']);
    Route::put('/edit-pengumuman/{id}', [PublikasiController::class, 'editPengumuman']);
    Route::delete('/delete-pengumuman/{id}', [PublikasiController::class, 'deletePengumuman']);
});