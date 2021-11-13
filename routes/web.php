<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MemberController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PenggunaController;
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
	Route::get('/paket', [PaketController::class, 'getPaket'])
			->name('getPaket');
	Route::get('/paket/update/{id}', [PaketController::class, 'updatePaket'])
			->name('updatePaket');
	Route::post('/paket/update/{id}', [PaketController::class, 'updatePaketAction'])
			->name('updatePaketAction');
	Route::get('/paket/create/', [PaketController::class, 'createPaket'])
			->name('createPaket');
	Route::post('/paket/create/', [PaketController::class, 'createPaketAction'])
			->name('createPaketAction');
	Route::delete('/paket/delete/{id}', [PaketController::class, 'deletePaket'])
			->name('deletePaket');

	
	// module pengguna
	Route::get('/pengguna', [PenggunaController::class, 'getPengguna'])
			->name('getPengguna');
	Route::get('/pengguna/update/{id}', [PenggunaController::class, 'updatePengguna'])
			->name('updatePengguna');
	Route::post('/pengguna/update/{id}', [PenggunaController::class, 'updatePenggunaAction'])->name('updatePenggunaAction');
	Route::get('/pengguna/create/', [PenggunaController::class, 'createPengguna'])
			->name('createPengguna');
	Route::post('/pengguna/create/', [PenggunaController::class, 'createPenggunaAction'])
			->name('createPenggunaAction');
	Route::delete('/pengguna/delete/{id}', [PenggunaController::class, 'deletePengguna'])
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
		