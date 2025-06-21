<?php

use App\Http\Controllers\ApiBerkasController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('berkas', [App\Http\Controllers\ApiBerkasController::class, 'getBerkasByUserAndPerizinan']);
Route::post('berkas', [App\Http\Controllers\ApiBerkasController::class, 'uploadBerkas']);

Route::get("user-month",[ApiBerkasController::class,"getUserAllMonth"])->name("user-month");
Route::get("transaksi-month",[ApiBerkasController::class,"getAllTransaksiMonth"])->name("transaksi-month");