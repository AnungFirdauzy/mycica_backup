<?php

use App\Http\Controllers\registerINV;
use App\Http\Controllers\registerPET;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\KatalogController;
use App\Http\Controllers\form_editProfilINV;
use App\Http\Controllers\form_editProfilPET;
use App\Http\Controllers\form_editDataKatalog;
use App\Http\Controllers\form_tambahDataKatalog;

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

Route::get('/katalog/tambah/{hash}',[form_tambahDataKatalog::class,'index']);
Route::post('/katalog/tambah/{hash}',[form_tambahDataKatalog::class,'simpan']);

Route::get('/katalog/profil/{hash}',[form_editDataKatalog::class,'index']);

Route::get('/katalog/edit/{hash}',[form_editDataKatalog::class,'edit']);
Route::post('/katalog/edit/{hash}',[form_editDataKatalog::class,'simpan']);