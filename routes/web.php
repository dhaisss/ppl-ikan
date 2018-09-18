<?php

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

Auth::routes();
//Login
Route::get('/home', 'HomeController@dashboard')->name('home');

//Agen
Route::get('/buatPenawaran', 'ikanController@penawaran');
Route::get('/insertPenawaran', 'ikanController@validator');
Route::post('/insertPenawaran', 'ikanController@insertPenawaran');
Route::get('/dashboardAgen', 'ikanController@agend');
Route::get('/daftarPenawaran/{id}', 'ikanController@view');
Route::get('/daftarPengusaha', 'agenController@pengusaha');

Route::get('/profilAgen/{id}', 'agenController@profil')->name('profil');
Route::post('/updateProfil/{id}', 'agenController@updateProfil')->name('profil');

Route::get('/editPenawaran/{id}', 'ikanController@editPenawaran');
Route::post('/updatePenawaran/{id}', 'ikanController@updatePenawaran');
Route::get('/agenNotifikasi/{id}','agenController@viewNotif');

Route::get('/transaksiAgen/{id}', 'agenController@transaksi');

Route::get('/telahDikirim/{id}', 'agenController@telahDikirim');


//Admin
Route::get('/daftarPenawaranAdmin', 'ikanController@view2');

Route::get('/dashboardAdmin', 'adminController@home');
Route::get('/profilAdmin/{id}', 'adminController@profil')->name('profil');
Route::get('/daftarPengusahaAdmin', 'adminController@pengusaha');
Route::get('/daftarAgenAdmin', 'adminController@agen');

//pengusaha

Route::get('/dashboardPengusaha', 'pengusahaController@home');
Route::get('/profilPengusaha/{id}', 'pengusahaController@profil')->name('profil');
Route::get('/daftarAgenPengusaha', 'pengusahaController@agen');
Route::get('/daftarPenawaranPengusaha', 'pengusahaController@view');
Route::get('/beliPenawaran/{id}', 'pengusahaController@beliPenawaran');
Route::post('/lanjutBeli', 'pengusahaController@lanjutBeli');
Route::get('/notifikasiPengusaha/{id}', 'pengusahaController@notif')->name('notif');
Route::get('/lanjutkanTransaksi/{id}', 'pengusahaController@lanjutkanTransaksi');
Route::post('/konfirmTransaksi/{id}', 'pengusahaController@konfirmTransaksi');
Route::get('/transaksiPengusaha/{id}', 'pengusahaController@transaksi')->name('daftar');
Route::get('/telahDiterima/{id}', 'pengusahaController@telahDiterima');

//transaksi

Route::get('/terimaTransaksi/{id}', 'agenController@terimaTransaksi');
Route::post('/updateTransaksi/{id}', 'agenController@updateTransaksi');
Route::get('/tolakTransaksi/{id}', 'agenController@tolakTransaksi');
Route::post('/updateTolakTransaksi/{id}', 'agenController@updateTolakTransaksi');


//admin
Route::get('notifikasiAdmin','adminController@lihatNotif');
Route::get('/verifikasi/{id}', 'adminController@verifikasi');
Route::get('/transaksiAdmin', 'adminController@transaksi');
