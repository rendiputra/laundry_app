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

Route::permanentRedirect('/', '/dashboard')->name('welcome');

Route::middleware('auth', 'verified')->group(function () {
	Route::view('dashboard', 'dashboard')->name('dashboard');
	Route::view('profile', 'profile')->name('profile');

	// module pelanggan
	Route::get('/pelanggan', 'App\Http\Controllers\MemberController@getPelanggan')->name('getPelanggan');
	Route::get('/pelanggan/update/{id}', 'App\Http\Controllers\MemberController@updatePelanggan')->name('updatePelanggan');
	Route::post('/pelanggan/update/{id}', 'App\Http\Controllers\MemberController@updatePelangganAction')->name('updatePelangganAction');
	Route::get('/pelanggan/create/', 'App\Http\Controllers\MemberController@createPelanggan')->name('createPelanggan');
	Route::post('/pelanggan/create/', 'App\Http\Controllers\MemberController@createPelangganAction')->name('createPelangganAction');
	Route::delete('/pelanggan/delete/{id}', 'App\Http\Controllers\MemberController@deletePelanggan')->name('deletePelanggan');

	// module outlet
	Route::get('/outlet', 'App\Http\Controllers\OutletController@getOutlet')->name('getOutlet');
	Route::get('/outlet/update/{id}', 'App\Http\Controllers\OutletController@updateOutlet')->name('updateOutlet');
	Route::post('/outlet/update/{id}', 'App\Http\Controllers\OutletController@updateOutletAction')->name('updateOutletAction');
	Route::get('/outlet/create/', 'App\Http\Controllers\OutletController@createOutlet')->name('createOutlet');
	Route::post('/outlet/create/', 'App\Http\Controllers\OutletController@createOutletAction')->name('createOutletAction');
	Route::delete('/outlet/delete/{id}', 'App\Http\Controllers\OutletController@deleteOutlet')->name('deleteOutlet');
	
	// module paket
	Route::get('/paket', 'App\Http\Controllers\PaketController@getPaket')->name('getPaket');
	Route::get('/paket/update/{id}', 'App\Http\Controllers\PaketController@updatePaket')->name('updatePaket');
	Route::post('/paket/update/{id}', 'App\Http\Controllers\PaketController@updatePaketAction')->name('updatePaketAction');
	Route::get('/paket/create/', 'App\Http\Controllers\PaketController@createPaket')->name('createPaket');
	Route::post('/paket/create/', 'App\Http\Controllers\PaketController@createPaketAction')->name('createPaketAction');
	Route::delete('/paket/delete/{id}', 'App\Http\Controllers\PaketController@deletePaket')->name('deletePaket');

	
	// module pengguna
});
