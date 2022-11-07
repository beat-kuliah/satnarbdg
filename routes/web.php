<?php

use App\Http\Controllers\BuktiController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\InventarisController;
use App\Http\Controllers\LampiranController;
use App\Http\Controllers\RencanaController;
use App\Http\Controllers\TahananController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {return redirect('/login');});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/perkara', [TahananController::class, 'index']);
Route::post('/perkara', [TahananController::class, 'store']);

Route::get('/anggota', [UserController::class, 'penyidik']);

Route::get('/rencana', [RencanaController::class, 'index']);
Route::post('/rencana', [RencanaController::class, 'store']);
Route::get('/rencana/{id}', [RencanaController::class, 'edit']);
Route::post('/rencana/update', [RencanaController::class, 'update']);

Route::get('/inventaris', [InventarisController::class, 'index']);
Route::post('/inventaris', [InventarisController::class, 'store']);
Route::get('/inventaris/{id}', [InventarisController::class, 'edit']);
Route::post('/inventaris/update', [InventarisController::class, 'update']);


Route::get('/lampiran', [LampiranController::class, 'index']);
Route::post('/lampiran', [LampiranController::class, 'store']);
Route::get('/lampiran/{id}', [LampiranController::class, 'edit']);
Route::post('/lampiran/update', [LampiranController::class, 'update']);
Route::get('/lampiran/{id}/destroy', [LampiranController::class, 'destroy']);

Route::get('/bukti', [BuktiController::class, 'index']);
Route::post('/bukti', [BuktiController::class, 'store']);
Route::get('/bukti/{id}', [BuktiController::class, 'edit']);
Route::post('/bukti/update', [BuktiController::class, 'update']);

Route::get('/{path}/{filename}', [Controller::class, 'getFoto']);