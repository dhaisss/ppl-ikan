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
Route::post('/insertPenawaran', 'ikanController@insertPenawaran');
Route::get('/dashboardAgen', 'ikanController@agend');
Route::get('/daftarPenawaran/{id}', 'ikanController@view');


Route::get('/profilAgen/{id}', 'agenController@profil')->name('profil');
Route::post('/updateProfil/{id}', 'agenController@updateProfil')->name('profil');
