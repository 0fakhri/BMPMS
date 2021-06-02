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

use App\Http\Controllers\pembayaranController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;



Auth::routes();
Route::group(['middleware' => ['auth', 'checkrole:Owner']], function () {
  Route::get('/owner', 'HomeController@indexOwner');
  Route::get('/owner/akun', 'UserController@index');
  Route::post('/owner/akun', 'UserController@store');
  Route::delete('/owner/akun/{id}', 'UserController@destroy');
  Route::post('/owner/konsumen', 'konsumenController@store');
  Route::get('/owner/konsumen', 'konsumenController@index');
  Route::delete('owner/konsumen/{id}/hapus', 'konsumenController@destroy');
  Route::get('/owner/konsumen/{id}/detail_konsumen', 'konsumenController@show');
  Route::get('/owner/proyek', 'kebutuhanPController@index');
  Route::get('/owner/tipeperumahan', 'tipePerumController@index');
  Route::get('/owner/spr', 'SPRController@index');
  Route::get('/owner/kproyek/{id}/detail', 'kebutuhanPController@show');
  Route::delete('/owner/kproyek/{id}/hapus', 'kebutuhanPController@destroy');
  Route::put('/owner/kproyek/{id}/verifikasi', 'kebutuhanPController@verifKP');
  Route::put('/owner/kproyek/{id}/edit', 'kebutuhanPController@update');
  Route::get('/owner/legalitas', 'legalitasController@index');
  Route::put('/owner/legalitas/{id}', 'legalitasController@update');
  Route::get('/owner/spr/pembayaran/{id}', 'pembayaranController@index');
});

Route::group(['middleware' => ['auth', 'checkrole:Manajer']], function () {
  Route::get('/manajer', 'HomeController@indexManajer');
  Route::get('/manajer/konsumen', 'konsumenController@index');
  Route::post('/manajer/konsumen', 'konsumenController@store');
  Route::put('/manajer/konsumen/{id}', 'konsumenController@update');
  Route::get('/manajer/konsumen/{id}/edit', 'konsumenController@edit');
  Route::delete('/manajer/konsumen/{id}', 'konsumenController@destroy');
  Route::get('/manajer/tipeperumahan', 'tipePerumController@index');
  Route::post('/manajer/tipeperumahan', 'tipePerumController@store');
  Route::delete('/manajer/tipeperumahan/{id}/hapus', 'tipePerumController@destroy');
  Route::put('/manajer/tipeperumahan/{id}', 'tipePerumController@update');
  Route::get('/manajer/spr', 'SPRController@index');
  Route::put('/manajer/spr/setuju/{id}', 'SPRController@setujui_spr');
  Route::put('/manajer/spr/tolak/{id}', 'SPRController@tolak_spr');
  Route::delete('/manajer/spr/hapus/{id}', 'SPRController@destroy');
  Route::get('/manajer/kproyek', 'kebutuhanPController@index');
  Route::get('/manajer/legalitas', 'legalitasController@index');
  Route::get('/manajer/spr/pembayaran/{id}', 'pembayaranController@index');
  Route::put('/pembayaran/edit/{id}', 'pembayaranController@update');
});


Route::group(['middleware' => ['auth', 'checkrole:Divisi Marketing']], function () {
  Route::get('/divmarketing', 'HomeController@indexMarketing');
  Route::get('/divmarketing/spr', 'SPRController@index');
  Route::post('/divmarketing/spr', 'SPRController@store');
  Route::get('/divmarketing/tipeperumahan', 'tipePerumController@index');
  Route::get('/divmarketing/konsumen', 'konsumenController@index');
  Route::post('/divmarketing/konsumen', 'konsumenController@store');
  Route::put('/divmarketing/konsumen/{id}', 'konsumenController@update');
  Route::get('/divmarketing/konsumen/{id}/edit', 'konsumenController@edit');
  Route::delete('/divmarketing/konsumen/{id}', 'konsumenController@destroy');
  Route::put('/manajer/konsumen/{id}', 'konsumenController@update');
});


Route::group(['middleware' => ['auth', 'checkrole:Divisi Keuangan']], function () {
  Route::get('/divkeuangan', 'HomeController@indexKeuangan');
  Route::get('/divkeuangan/konsumen', 'konsumenController@index');
  Route::get('/divkeuangan/konsumen/{id}/detail_konsumen', 'konsumenController@show');
  Route::get('/divkeuangan/spr', 'SPRController@index');
  Route::get('/divkeuangan/spr/pembayaran/{id}', 'pembayaranController@index');
  Route::post('/pembayaran/{id}', 'pembayaranController@store');
});

Route::group(['middleware' => ['auth', 'checkrole:Kontraktor']], function () {
  Route::get('/kontraktor', 'HomeController@indexKontraktor');
  Route::get('/kontraktor/kproyek', 'kebutuhanPController@index');
  Route::post('/kontraktor/kproyek', 'kebutuhanPController@store');
  Route::get('/kontraktor/kproyek/{id}/detail', 'kebutuhanPController@show');
  Route::post('/kontraktor/mproyek', 'materialPController@store');
});

Route::group(['middleware' => ['auth', 'checkrole:Supplier']], function () {
  Route::get('/supplier', 'HomeController@indexSupplier');
  Route::get('/supplier/mproyek', 'materialPController@index');
  Route::put('/supplier/mproyek/setujui/{id}', 'materialPController@material_setujui');
  Route::put('/supplier/mproyek/tolak/{id}', 'materialPController@material_tolak');
});

Route::group(['middleware' => 'auth'], function () {
  Route::get('/', 'home@index');
  Route::get('spr/pdf/{id}', 'SPRController@printpdf');
  Route::put('/owner/akun/{id}', 'UserController@update');
  Route::get('/owner/proyek/{id}/download', 'kebutuhanPController@download');
  Route::get('/legalitas/pdf/{id}', 'legalitasController@download');
  Route::get('/kontraktor/mproyek/{id}/download', 'materialPController@download');
  Route::post('/pembayaran/{id}', 'pembayaranController@store');
});

Route::get('/home', 'HomeController@index')->name('home');
