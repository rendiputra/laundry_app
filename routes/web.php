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
	// module produk
	// module pengguna
});
