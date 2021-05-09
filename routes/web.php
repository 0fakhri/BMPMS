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

Route::get('/', 'home@index');
  Route::get('/data_akun', 'dataakun@index');
  Route::post('/data_akun/create','dataakun@create');
  Route::get('/data_akun/edit/{id}', 'dataakun@edit');
  Route::post('/data_akun/update/{id}', 'dataakun@update');
  Route::get('/data_akun/{id}','dataakun@show');
  Route::get('/dashboard','dataakun@show');
  Route::get('/home', function () {
    return view ('manajer.dashboard');
    });
Route::get('/approv-kwitansi', function () {
        return view ('manajer.approval_kwitansi');
    });
    Route::get('/draft-pengeluaran', function () {
        return view ('manajer.draft_pengeluaran');
    });
    Route::get('/kartu-kontrol', function () {
      return view ('manajer.keuangan.kartu_kontrol');
  });
  Route::get('/perumahan', function () {
    return view ('manajer.keuangan.pilihPerumahan');
});
