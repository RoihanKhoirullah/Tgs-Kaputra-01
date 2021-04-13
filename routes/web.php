<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', function () {
    return view('frontend.index');
});
Route::get('/admin', function () {
    return view('admin.index');
});
Route::get('/tambah-siswa', function () {
    return view('frontend.siswa.index');
});

// Login
Route::get('/login', function () {
    return view('pengguna.login');
});
Route::post('/postlogin' , 'LoginController@postlogin')->name('postlogin');
Route::get('/logout' , 'LoginController@logout')->name('logout');

// Registrasi
Route::get('/registrasi' , 'LoginController@registrasi')->name('registrasi');
Route::post('/simpanregistrasi' , 'LoginController@simpanregistrasi')->name('simpanregistrasi');

//SISWA
Route::get('/siswa' , 'SiswaController@index')->name('siswa');
Route::post('/simpan' , 'SiswaController@store')->name('simpan');
Route::get('/edit/{id}' , 'SiswaController@edit')->name('edit');
Route::post('/update/{id}' , 'SiswaController@update')->name('update');
Route::get('/delete/{id}' , 'SiswaController@destroy')->name('delete');

Route::get('/laporansiswa/{id}' , 'LaporansiswaController@index')->name('laporansiswa');

Route::get('/datasiswa' , 'DatasiswaController@index')->name('datasiswa');

// Multi Login
Route::group(['middleware' => ['auth', 'ceklevel:admin']], function() {

    Route::get('/siswa' , 'SiswaController@index')->name('siswa');

});

Route::group(['middleware' => ['auth', 'ceklevel:siswa']], function() {

    Route::get('/datasiswa' , 'DatasiswaController@index')->name('datasiswa');

});