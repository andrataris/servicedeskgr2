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
/*
Route::get('/', function () {
    return view('home');
});
*/
Route::group(['middleware' => 'revalidate'], function()
{

Auth::routes();
/*
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index');
*/
/* home untuk transaksi ticket*/
Route::get('/homeot', 'HomeotController@index')->name('homeot');
Route::get('/', 'HomeotController@index');
/*
Route::get('/user', 'UserController@index');
Route::get('/user-register', 'UserController@create');
Route::post('/user-register', 'UserController@store');
Route::get('/user-edit/{id}', 'UserController@edit');
*/
Route::resource('user', 'UserController');

Route::resource('anggota', 'AnggotaController');
/* nambah menu master service dan sub service */
Route::resource('subservice', 'SubserviceController');
Route::resource('service', 'ServiceController');
Route::resource('layanan', 'LayananController');
Route::resource('akseslayanan', 'AkseslayananController');



Route::resource('apprrovebidang', 'ApprrovebidangController');
Route::resource('appatasanit', 'AppatasanitController');
Route::resource('apppetugasit', 'ApppetugasitController');


Route::resource('buku', 'BukuController');
Route::get('/format_buku', 'BukuController@format');
Route::post('/import_buku', 'BukuController@import');

Route::resource('transaksi', 'TransaksiController');

Route::resource('transaksiot', 'TransaksiotController');

Route::get('/laporan/trs', 'LaporanController@transaksi');
Route::get('/laporan/trs/pdf', 'LaporanController@transaksiPdf');
Route::get('/laporan/trs/excel', 'LaporanController@transaksiExcel');

Route::get('/laporan/buku', 'LaporanController@buku');
Route::get('/laporan/buku/pdf', 'LaporanController@bukuPdf');
Route::get('/laporan/buku/excel', 'LaporanController@bukuExcel');

Route::get('/tiket', 'TiketController@index');
Route::get('/tiket/create', 'TiketController@create');
Route::get('/tiket/create/{id}', 'TiketController@created');
Route::get('/tiket/create/{id}/{id2}', 'TiketController@add');
Route::post('/tiket/create/{id}/{id2}', 'TiketController@store');

});

Route::get('email','SendMailController@index');
Route::post('email/send','SendMailController@send');

