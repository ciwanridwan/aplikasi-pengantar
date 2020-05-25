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

Route::group(['prefix' => 'penduduk'], function() {
	Route::get('register', 'RakyatController@create')->name('rakyat.register');
	Route::post('store-register', 'RakyatController@store')->name('rakyat.post_register');
	Route::get('login', 'RakyatController@loginForm')->name('rakyat.login');
	Route::post('store-login', 'RakyatController@login')->name('rakyat.post_login');
	Route::get('form', 'RakyatController@viewSurat')->name('rakyat.form');
	Route::post('store-form', 'RakyatController@storeSurat')->name('rakyat.store-form');
	Route::get('list', 'RakyatController@list')->name('rakyat.list');
	Route::get('/pengantar/cetak-pdf', 'RakyatController@cetakPdf');
	Route::get('surat', 'RakyatController@surat');

	Route::group(['middleware' => 'rakyat'], function() {
		Route::get('home', 'RakyatController@list')->name('rakyat.dashboard');
		Route::get('logout', 'RakyatController@logout')->name('rakyat.logout'); 
	});
});	

Auth::routes();

Route::get('/', function () {
	return view('auth.login');
});

Route::get('home', 'HomeController@index')->name('home');
Route::get('login-rt', 'HomeController@login')->name('login-rt');
Route::get('form', 'RtController@create')->name('form');
Route::post('store-form', 'RtController@store')->name('store-form');

Route::get('form-pengantar', 'PengantarController@create')->name('form-pengantar'); 
Route::post('store-pengantar', 'PengantarController@store')->name('store-pengantar');

Route::get('table', 'RtController@read')->name('table');
Route::get('index', 'RtController@index')->name('index');
Route::get('table-pengantar', 'PengantarController@index')->name('table-pengantar');

Route::get('/{pengantar}', 'PengantarController@edit')->name('edit-pengantar');
Route::get('edit/{penduduk}', 'RtController@edit')->name('edit-penduduk');

Route::put('/{id}', 'RtController@update')->name('update');
Route::put('update/{id}', 'PengantarController@update')->name('update-pengantar');

Route::delete('delete/pengantar/{id}', 'PengantarController@destroy')->name('delete-pengantar');
Route::delete('delete/{id}', 'RtController@destroy')->name('delete');

Route::get('/pengantar/cetak_pdf', 'PengantarController@cetak_pdf');
