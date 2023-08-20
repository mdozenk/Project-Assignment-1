<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MuridController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\NilaiController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Routes for KelasController
Route::get('/kelas', [KelasController::class, 'index']);
Route::get('/kelas/{id}', [KelasController::class, 'show']);
Route::post('/kelas', [KelasController::class, 'store']);
Route::put('/kelas/{id}', [KelasController::class, 'update']);

// Routes for MuridController
Route::get('/murid', [MuridController::class, 'index']);
Route::get('/murid/{id}', [MuridController::class, 'show']);
Route::post('/murid', [MuridController::class, 'store']);
Route::put('/murid/{id}', [MuridController::class, 'update']);
Route::get('/murid/{id}/detail', [MuridController::class, 'showDetailMurid']);

// Routes for MataPelajaranController
Route::get('/mata-pelajaran', [MataPelajaranController::class, 'index']);
Route::get('/mata-pelajaran/{id}', [MataPelajaranController::class, 'show']);
Route::post('/mata-pelajaran', [MataPelajaranController::class, 'store']);
Route::put('/mata-pelajaran/{id}', [MataPelajaranController::class, 'update']);

// Routes for NilaiController
Route::get('/nilai/murid/{muridId}', [NilaiController::class, 'showNilaiMurid']);
Route::post('/nilai/murid/{muridId}/mata-pelajaran/{matapelajaranId}', [NilaiController::class, 'storeNilai']);
