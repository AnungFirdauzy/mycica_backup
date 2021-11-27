<?php

use App\Http\Controllers\registerINV;
use App\Http\Controllers\registerPET;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\form_editProfilINV;
use App\Http\Controllers\form_editProfilPET;
use App\Http\Controllers\InvestasiController;
use App\Http\Controllers\form_editDataKatalog;
use App\Http\Controllers\form_perbaruiDataBurungInvestasi;
use App\Http\Controllers\form_tambahDataKatalog;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\RiwayatTransaksiController;

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
    return view('welcome');
});

Route::get('/registerINV',[registerINV::class,'view']);
Route::post('/registerINV',[registerINV::class,'register']);

Route::get('/registerPET',[registerPET::class,'view']);
Route::post('/registerPET',[registerPET::class,'register']);

Route::get('/login', function () {
    return view('login');
});

Route::post('/dashboard',[DashController::class, 'getDataAkun']);
Route::get('/dashboard/{id}/{role}',[DashController::class, 'view']);

Route::get('/profil/{role}/{hash}',[ProfilController::class,'view']);

// Investor
Route::get('/profil/investor/edit/{code}',[form_editProfilINV::class,'view']);
Route::post('/profil/investor/edit/{code}',[form_editProfilINV::class,'simpan']);

// Peternak
Route::get('/profil/peternak/edit/{code}',[form_editProfilPET::class,'view']);
Route::post('/profil/peternak/edit/{code}',[form_editProfilPET::class,'simpan']);

Route::get('/katalog/peternak/{hash}',[KatalogController::class,'getData']);

//Burung
Route::get('/katalog/tambah/{hash}',[form_tambahDataKatalog::class,'index']);
Route::post('/katalog/tambah/{hash}',[form_tambahDataKatalog::class,'simpan']);

Route::get('/katalog/profil/{hash}',[form_editDataKatalog::class,'index']);

Route::get('/katalog/edit/{hash}',[form_editDataKatalog::class,'edit']);
Route::post('/katalog/edit/{hash}',[form_editDataKatalog::class,'simpan']);

Route::get('/katalog/detailBurung/{email}',[InvestasiController::class,'openkatalog']);

// Investasi (Investor)
Route::get('/katalog/profil/{hash}/{dash_data}',[InvestasiController::class,'view']);
Route::get('/katalog/investasi/inv/{email}',[InvestasiController::class,'view_katalog']);
Route::get('/investasi/{id_burung}/{emailinvestor}',[InvestasiController::class,'investasi']);
Route::get('/tagihan/{emailinvestor}/{idburung}',[InvestasiController::class,'view_tagihan']);
Route::get('/paid/{hash}/{email}',[InvestasiController::class,'paid']);
Route::get('/detail/investasi/{hash}',[InvestasiController::class,'detail']);

// Investasi (peternak)
Route::get('/katalog/investasi/pet/{email}',[InvestasiController::class,'view_katalog_pet']);
Route::get('/katalog/investasi/pet/detail/{id}/{email}',[InvestasiController::class,'view_detail_burung_pet']);
Route::get('/katalog/investasi/pet/detail/{id}/{email}',[InvestasiController::class,'view_detail_burung_pet']);
Route::get('/konfirmasi/pembayaran/{burung}',[InvestasiController::class,'view_konfirmasi_pembayaran']);
Route::get('/konfirmasi/pet/{id}/{dash}',[InvestasiController::class,'verifikasiPembayaran']);

Route::get('/investasis/perbarui/{nama_burung}',[form_perbaruiDataBurungInvestasi::class,'view']);
Route::post('/investasis/perbarui/{nama_burung}',[form_perbaruiDataBurungInvestasi::class,'simpan']);

// Penjualan (investor)
Route::get('/jual/{email}/{id_transaksi}',[PenjualanController::class,'view_jual']);
Route::get('/jual/sistemsale/{email}/{id_transaksi}',[PenjualanController::class,'jual_inv']);

// Penjualan (penjual)
Route::get('/jualpet/{email}/{id_transaksi}',[PenjualanController::class,'form_jual_pet']);
Route::post('/jualpet/{email}/{id_transaksi}',[PenjualanController::class,'form_jual_pet_terjual']);

// Riwayat Transaksi
Route::get('/peternak/investorlist/{email}',[RiwayatTransaksiController::class,'view_list_pet']);
Route::get('/peternak/investorlist/{email}/{id_investasi}',[RiwayatTransaksiController::class,'view_list_detail_pet']);

Route::get('/investor/listburung/{email}',[RiwayatTransaksiController::class,'view_list_inv']);
Route::get('/investor/listburung/{email}/{id_investasi}',[RiwayatTransaksiController::class,'view_list_detail_inv']);

// MOU
Route::post('/mou/{dash_data}',[InvestasiController::class,'simpan_mou']);





