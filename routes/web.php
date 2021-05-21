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
  Route::get('/data_akun', 'dataakun@index');
  Route::post('/data_akun/create','dataakun@create');
  Route::get('/data_akun/edit/{id}', 'dataakun@edit');
  Route::post('/data_akun/update/{id}', 'dataakun@update');
  Route::get('/data_akun/{id}','dataakun@show');
  Route::get('/dashboard','dataakun@show');

  Route::get('/', function () {
    return view ('manajer.dashboard');
    });

  Route::get('/user', function () {
    return view ('manajer.user');
  });
  
  Route::get('/konsumen', function () {
    return view ('manajer.konsumen');
  });

  Route::get('/kebutuhan-proyek', function () {
    return view ('manajer.kebutuhan_proyek');
  });

  Route::get('/spr', function () {
    return view ('manajer.spr');
  });

  Route::get('/verif-spr', function () {
    return view ('manajer.verif_spr');
  });

  Route::get('/pembayaran', function () {
    return view ('manajer.pembayaran');
  });

  Route::get('/legalitas', function () {
    return view ('manajer.legalitas');
  });

  Route::get('/tipe-perumahan', function () {
    return view ('manajer.tipePerumahan');
  });

  Route::get('/user/edit', function () {
    return view ('manajer.editUser');
  });

  Route::get('/konsumen/edit', function () {
    return view ('manajer.editKonsumen');
  });

  Route::get('/spr/edit', function () {
    return view ('manajer.editSpr');
  });

  Route::get('/pembayaran/edit', function () {
    return view ('manajer.editPembayaran');
  });

  Route::get('/legalitas', function () {
    return view ('manajer.legalitas');
  });

  Route::get('/legalitas/edit', function () {
    return view ('manajer.editLegalitas');
  });

  Route::get('/tipe-perumahan/edit', function () {
    return view ('manajer.editTipePerumahan');
  });