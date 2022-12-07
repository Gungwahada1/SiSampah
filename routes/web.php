<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\NasabahController;

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

Route::get('clear_cache', function () {
    \Artisan::call('cache:clear');
    \Artisan::call('config:cache');
    dd("Sudah Bersih nih!, Silahkan Kembali ke Halaman Utama");
});


Route::get('/', [HomeController::class, 'login'])->name('login');
Route::post('ceklogin', [HomeController::class, 'ceklogin'])->name('ceklogin');

Route::get('auth/forgot-password', [HomeController::class, 'forgot'])->name('forgot');
Route::post('auth/forgot-password/cek-data', [HomeController::class, 'proses_forgot'])->name('proses_forgot');
Route::post('auth/forgot-password/verfikasi-kode', [HomeController::class, 'cek_verifikasi'])->name('cek_verifikasi');
Route::post('auth/forgot-password/ubah-password/proses', [HomeController::class, 'ubah_password'])->name('ubah_password');

Route::group(['middleware' => ['auth', 'ceklevel:Petugas,Admin']], function () {
    Route::get('page/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');

    Route::get('page/data-petugas', [AdminController::class, 'user_petugas'])->name('user_petugas');
    Route::get('page/data-nasabah', [AdminController::class, 'user_nasabah'])->name('user_nasabah');
    Route::get('page/data-user/form-tambah-user', [AdminController::class, 'form_tambah'])->name('form_tambah');
    Route::post('page/data-user/form-tambah-user/tambah', [AdminController::class, 'adduser'])->name('adduser');
    Route::get('page/data-user/form-update-user/{id}', [AdminController::class, 'form_update'])->name('form_update');
    Route::post('page/data-user/form-update-user/ubah/{id}', [AdminController::class, 'updateuser'])->name('updateuser');
    Route::get('page/data-user/act-del/{id}', [AdminController::class, 'del_user'])->name('del_user');
    Route::get('page/data-user/cek/{id}', [AdminController::class, 'cek_user'])->name('cek_user');

    Route::get('page/data-jenis', [AdminController::class, 'data_jenis'])->name('data_jenis');
    Route::post('page/data-jenis/tambah', [AdminController::class, 'addjenis'])->name('addjenis');
    Route::post('page/data-jenis/update/{id_jenis}', [AdminController::class, 'updatejenis'])->name('updatejenis');
    Route::get('page/data-jenis/hapus/{id_jenis}', [AdminController::class, 'deletejenis'])->name('deletejenis');
    Route::get('page/cek-tong-sampah', [AdminController::class, 'cekTongSampah'])->name('cek.tong.sampah');

    Route::post('page/profil-admin/update', [AdminController::class, 'ubah_admin'])->name('ubah_admin');


    // Petugas
    Route::get('page/data-penyetoran-semua', [PetugasController::class, 'data_penyetoran'])->name('data_penyetoran');
    Route::get('page/data-penyetoran-bulan-ini', [PetugasController::class, 'data_penyetoran_bulanini'])->name('data_penyetoran_bulanini');
    Route::get('page/data-penyetoran/form-tambah', [PetugasController::class, 'form_add_penyetoran'])->name('form_add_penyetoran');
    Route::post('page/data-penyetoran/act-tambah', [PetugasController::class, 'add_penyetoran'])->name('add_penyetoran');
    Route::get('page/data-penyetoran/form-ubah/{id_penyetoran}', [PetugasController::class, 'form_update_penyetoran'])->name('form_update_penyetoran');
    Route::post('page/data-penyetoran/act-update/{id_penyetoran}', [PetugasController::class, 'update_penyetoran'])->name('update_penyetoran');
    Route::get('page/data-penyetoran/act-hapus/{id_penyetoran}', [PetugasController::class, 'hapus_penyetoran'])->name('hapus_penyetoran');

    Route::get('page/tabungan-nasabah', [PetugasController::class, 'tabungan_nasabah'])->name('tabungan_nasabah');
    Route::post('page/tabungan-nasabah/tarik-act/{id}', [PetugasController::class, 'tarik_tabungan'])->name('tarik_tabungan');
    Route::get('page/riwayat-penarikan-tabungan/{id}', [PetugasController::class, 'riwayat_penarikan'])->name('riwayat_penarikan');

    Route::get('page/poin-nasabah', [PetugasController::class, 'poin_nasabah'])->name('poin_nasabah');
    Route::post('page/poin-nasabah/tukar-act/{id}', [PetugasController::class, 'tukar_poin'])->name('tukar_poin');
    Route::get('page/riwayat-penukaran-poin/{id}', [PetugasController::class, 'riwayat_penukaran'])->name('riwayat_penukaran');


    Route::get('page/laporan-penyetoran', [PetugasController::class, 'laporan_penyetoran'])->name('laporan_penyetoran');
    Route::get('page/laporan-penyetoran/export-laporan', [PetugasController::class, 'export_penyetoran'])->name('export_penyetoran');
});

Route::group(['middleware' => ['auth', 'ceklevel:Nasabah,Admin,Petugas']], function () {
    Route::get('page/beranda-nasabah', [NasabahController::class, 'beranda_saya'])->name('beranda_saya');

    Route::get('page/aktivitas-saya', [NasabahController::class, 'aktivitas_saya'])->name('aktivitas_saya');
    Route::get('page/riwayat-penarikan-saya', [NasabahController::class, 'penarikan_saya'])->name('penarikan_saya');
    Route::get('page/riwayat-penukaran-saya', [NasabahController::class, 'penukaran_saya'])->name('penukaran_saya');

    Route::get('page/profil', [AdminController::class, 'profil'])->name('profil');
    Route::post('page/profil/ubah/{id}', [AdminController::class, 'ubah_user'])->name('ubah_user');
    Route::post('page/profil/ganti-password/{id}', [AdminController::class, 'ganti_password'])->name('ganti_password');
});
Route::get('page/read', [HomeController::class, 'read'])->name('read');

Route::get('logout', [HomeController::class, 'logout'])->name('logout');