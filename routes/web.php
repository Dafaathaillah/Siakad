<?php

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
    return redirect('login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/user/login', [App\Http\Controllers\Auth\LoginController::class, 'loginaja']);
//prodi
Route::get('/prodi', [App\Http\Controllers\ProdiController::class, 'index']);
Route::get('/prodi/delete/{id}', [App\Http\Controllers\ProdiController::class, 'delete']);
Route::get('/prodi/edit/{id}', [App\Http\Controllers\ProdiController::class, 'edit']);
Route::post('/prodi/create', [App\Http\Controllers\ProdiController::class, 'create']);
Route::post('/prodi/update/{id}', [App\Http\Controllers\ProdiController::class, 'update']);

//jurusan
Route::get('/jurusan', [App\Http\Controllers\JurusanController::class, 'index']);
Route::get('/jurusan/delete/{id}', [App\Http\Controllers\JurusanController::class, 'delete']);
Route::get('/jurusan/edit/{id}', [App\Http\Controllers\JurusanController::class, 'edit']);
Route::post('/jurusan/create', [App\Http\Controllers\JurusanController::class, 'create']);
Route::post('/jurusan/update/{id}', [App\Http\Controllers\JurusanController::class, 'update']);

//dosen
Route::get('/dosen', [App\Http\Controllers\DosenController::class, 'index']);
Route::get('/dosen/delete/{id}', [App\Http\Controllers\DosenController::class, 'delete']);
Route::get('/dosen/edit/{id}', [App\Http\Controllers\DosenController::class, 'edit']);
Route::post('/dosen/create', [App\Http\Controllers\DosenController::class, 'create']);
Route::post('/dosen/update/{id}', [App\Http\Controllers\DosenController::class, 'update']);

//kelas
Route::get('/kelas', [App\Http\Controllers\KelasController::class, 'index']);
Route::get('/kelas/delete/{id}', [App\Http\Controllers\KelasController::class, 'delete']);
Route::get('/kelas/edit/{id}', [App\Http\Controllers\KelasController::class, 'edit']);
Route::post('/kelas/create', [App\Http\Controllers\KelasController::class, 'create']);
Route::post('/kelas/update/{id}', [App\Http\Controllers\KelasController::class, 'update']);

//matakuliah
Route::get('/matakuliah', [App\Http\Controllers\MataKuliahController::class, 'index']);
Route::get('/matakuliah/edit/{id}', [App\Http\Controllers\MataKuliahController::class, 'edit']);
Route::get('/matakuliah/list/krs', [App\Http\Controllers\MataKuliahController::class, 'indexMhs']);
Route::get('/matakuliah/list/krs/cetak/{id}', [App\Http\Controllers\MataKuliahController::class, 'cetakPfd']);
Route::get('/matakuliah/delete/{id}', [App\Http\Controllers\MataKuliahController::class, 'delete']);
Route::post('/matakuliah/create', [App\Http\Controllers\MataKuliahController::class, 'create']);
Route::post('/matakuliah/update/{id}', [App\Http\Controllers\MataKuliahController::class, 'update']);
Route::post('/matakuliah/update/biodata/{id}', [App\Http\Controllers\MataKuliahController::class,
 'updateSelf']);
Route::post('/matakuliah/krs/', [App\Http\Controllers\MataKuliahController::class, 'updateMatakuliahPilih']);

//mahasiswa
Route::get('/mahasiswa', [App\Http\Controllers\MahasiswaController::class, 'index']);
Route::get('/mahasiswa/edit/{id}', [App\Http\Controllers\MahasiswaController::class, 'edit']);
Route::get('/mahasiswa/delete/{id}', [App\Http\Controllers\MahasiswaController::class, 'delete']);
Route::get('/mahasiswa/biodata/', [App\Http\Controllers\MahasiswaController::class, 'detail']);
Route::post('/mahasiswa/create', [App\Http\Controllers\MahasiswaController::class, 'create']);
Route::post('/mahasiswa/update/{id}', [App\Http\Controllers\MahasiswaController::class, 'update']);
Route::post('/mahasiswa/update/biodata/{id}', [App\Http\Controllers\MahasiswaController::class, 'updateSelf']);

//pembayaran
Route::get('/pembayaran/admin', [App\Http\Controllers\PembayaranController::class, 'index']);
Route::get('/pembayaran/admin/filter/{id}', [App\Http\Controllers\PembayaranController::class, 'filterJurusan']);
Route::get('/pembayaran/mahasiswa',
 [App\Http\Controllers\PembayaranController::class, 'indexPemabayaranMhs']);
Route::get('/pembayaran/mahasiswa/log',
 [App\Http\Controllers\PembayaranController::class, 'indexPemabayaranMhsRiwayat']);
 Route::post('/pembayaran/generate',
 [App\Http\Controllers\PembayaranController::class, 'generatePembayaran']);
 Route::post('/pembayaran/upbukti/{id}',
 [App\Http\Controllers\PembayaranController::class, 'upBukti']);
  Route::get('/pembayaran/sudah/{id}',
 [App\Http\Controllers\PembayaranController::class, 'sudahBayar']);