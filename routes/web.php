<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
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
	Route::view('dashboard', 'dashboard')
			->name('dashboard');
	Route::view('profile', 'profile')
			->name('profile');

	// module pelanggan
	Route::get('/pelanggan', [MemberController::class, 'getPelanggan'])
			->name('getPelanggan');
	Route::get('/pelanggan/update/{id}', [MemberController::class, 'updatePelanggan'])
			->name('updatePelanggan');
	Route::post('/pelanggan/update/{id}', [MemberController::class, 'updatePelangganAction'])
			->name('updatePelangganAction');
	Route::get('/pelanggan/create/', [MemberController::class, 'createPelanggan'])		->name('createPelanggan');
	Route::post('/pelanggan/create/', [MemberController::class, 'createPelangganAction'])
			->name('createPelangganAction');
	Route::delete('/pelanggan/delete/{id}', [MemberController::class, 'deletePelanggan'])
			->name('deletePelanggan');

	// module outlet
	Route::get('/outlet', [OutletController::class, 'getOutlet'])
			->name('getOutlet');
	Route::get('/outlet/update/{id}', [OutletController::class, 'updateOutlet'])
			->name('updateOutlet');
	Route::post('/outlet/update/{id}', [OutletController::class, 'updateOutletAction'])
			->name('updateOutletAction');
	Route::get('/outlet/create/', [OutletController::class, 'createOutlet'])
			->name('createOutlet');
	Route::post('/outlet/create/', [OutletController::class, 'createOutletAction'])
			->name('createOutletAction');
	Route::delete('/outlet/delete/{id}', [OutletController::class, 'deleteOutlet'])
			->name('deleteOutlet');
	
	// module paket
	Route::get('/paket', 'App\Http\Controllers\PaketController@getPaket')
			->name('getPaket');
	Route::get('/paket/update/{id}', 'App\Http\Controllers\PaketController@updatePaket')
			->name('updatePaket');
	Route::post('/paket/update/{id}', 'App\Http\Controllers\PaketController@updatePaketAction')
			->name('updatePaketAction');
	Route::get('/paket/create/', 'App\Http\Controllers\PaketController@createPaket')
			->name('createPaket');
	Route::post('/paket/create/', 'App\Http\Controllers\PaketController@createPaketAction')
			->name('createPaketAction');
	Route::delete('/paket/delete/{id}', 'App\Http\Controllers\PaketController@deletePaket')
			->name('deletePaket');

	
	// module pengguna
	Route::get('/pengguna', 'App\Http\Controllers\PenggunaController@getPengguna')
			->name('getPengguna');
	Route::get('/pengguna/update/{id}', 'App\Http\Controllers\PenggunaController@updatePengguna')
			->name('updatePengguna');
	Route::post('/pengguna/update/{id}', 'App\Http\Controllers\PenggunaController@updatePenggunaAction')->name('updatePenggunaAction');
	Route::get('/pengguna/create/', 'App\Http\Controllers\PenggunaController@createPengguna')
			->name('createPengguna');
	Route::post('/pengguna/create/', 'App\Http\Controllers\PenggunaController@createPenggunaAction')
			->name('createPenggunaAction');
	Route::delete('/pengguna/delete/{id}', 'App\Http\Controllers\PenggunaController@deletePengguna')
			->name('deletePengguna');


	// Module Transaksi
	Route::get('/transaksi', 'App\Http\Controllers\TransaksiController@getTransaksi')
			->name('getTransaksi');
	Route::get('/transaksi/create', 'App\Http\Controllers\TransaksiController@createTransaksi')
			->name('createTransaksi');
			Route::post('/transaksi/create', 'App\Http\Controllers\TransaksiController@createTransaksiAction')
			->name('createTransaksiAction');
	Route::get('/transaksi/DetailTransaksi/{id}', 'App\Http\Controllers\TransaksiController@getDetailTransaksi')
			->name('getDetailTransaksi');
});
		