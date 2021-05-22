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

// Route::get('/', 'home@index');

use App\Http\Controllers\UserController;

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
  Route::get('/', function () {
    return view('manajer.dashboard');
  });

  Route::post('/user', 'userController@store');
  Route::get('/user', 'userController@index');
  Route::delete('/user/{id}/hapus', 'UserController@destroy');
  Route::post('/konsumen', 'konsumenController@store');
  Route::get('/konsumen', 'konsumenController@index');
  Route::delete('/konsumen/{id}/hapus', 'konsumenController@destroy');

  Route::get('/kebutuhan-proyek', function () {
    return view('manajer.kebutuhan_proyek');
  });

  Route::get('/spr', function () {
    return view('manajer.spr');
  });

  Route::get('/verif-spr', function () {
    return view('manajer.verif_spr');
  });

  Route::get('/pembayaran', function () {
    return view('manajer.pembayaran');
  });

  Route::get('/legalitas', function () {
    return view('manajer.legalitas');
  });

  Route::get('/tipe-perumahan', function () {
    return view('manajer.tipePerumahan');
  });

  Route::get('/user/edit', function () {
    return view('manajer.editUser');
  });

  Route::get('/konsumen/edit', function () {
    return view('manajer.editKonsumen');
  });

  Route::get('/spr/edit', function () {
    return view('manajer.editSpr');
  });

  Route::get('/pembayaran/edit', function () {
    return view('manajer.editPembayaran');
  });

  Route::get('/legalitas', function () {
    return view('manajer.legalitas');
  });

  Route::get('/legalitas/edit', function () {
    return view('manajer.editLegalitas');
  });

  Route::get('/tipe-perumahan/edit', function () {
<<<<<<< Updated upstream
    return view ('manajer.editTipePerumahan');
  });

//OWNER
Route::view('/', 'owner/index');
Route::view('/owner/akun', 'owner/akun');
Route::view('/owner/pembayaran', 'owner/pembayaran');
Route::view('/owner/detail_pembayaran', 'owner/detail_pembayaran');
Route::view('/owner/konsumen', 'owner/konsumen');
Route::view('/owner/detail_konsumen', 'owner/detail_konsumen');
Route::view('/owner/proyek', 'owner/proyek');
Route::view('/owner/legalitas', 'owner/legalitas');
Route::view('/owner/tipe_perumahan', 'owner/tipe_perumahan');
=======
    return view('manajer.editTipePerumahan');
  });

  Route::get('/home', 'HomeController@index')->name('home');
});
>>>>>>> Stashed changes
