<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\IbadahKategorialController;
use App\Http\Controllers\IbadahKeluargaController;
use App\Http\Controllers\IbadahMingguAnakController;
use App\Http\Controllers\IbadahMingguController;
use App\Http\Controllers\JadwalIbadahKategorialController;
use App\Http\Controllers\JadwalIbadahMingguAnakController;
use App\Http\Controllers\JadwalIbadahMingguController;
use App\Http\Controllers\JadwalOrganisController;
use App\Http\Controllers\MajelisJemaatController;
use App\Http\Controllers\StolaController;
use App\Http\Controllers\TeamMusicController;
use App\Http\Controllers\TempatIbadahController;
use App\Http\Controllers\WilayahPelayanController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->prefix("/auth")->group(function () {
    Route::post('/login', "login");
    Route::post('/register', "register");
    Route::post('/logout', "logout");
    Route::post('/refresh', "refresh");
});

Route::resource('ibadah_kategorial', IbadahKategorialController::class);
Route::resource('ibadah_keluarga', IbadahKeluargaController::class);
Route::resource('ibadah_minggu_anak', IbadahMingguAnakController::class);
Route::resource('ibadah_minggu', IbadahMingguController::class);
Route::resource('jadwal_ibadah_kategorial', JadwalIbadahKategorialController::class);
Route::resource('jadwal_ibadah_minggu_anak', JadwalIbadahMingguAnakController::class);
Route::resource('jadwal_ibadah_minggu', JadwalIbadahMingguController::class);
Route::resource('jadwal_organis', JadwalOrganisController::class);
Route::resource('majelis_jemaat', MajelisJemaatController::class);
Route::resource('stola', StolaController::class);
Route::resource('team_music', TeamMusicController::class);
Route::resource('tempat_ibadah', TempatIbadahController::class);
Route::resource('wilayah_pelayanan', WilayahPelayanController::class);
