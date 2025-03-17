<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BerkasUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PerizinanFileController;
use App\Http\Controllers\PermohonanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProfileOperator;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get("/auth",[AuthController::class,'LoginMember'])->name('login');
Route::post("/auth",[AuthController::class,'StoreLogin'])->name('login.store');


Route::get("/register",[RegisterController::class,'index'])->name('register');
Route::post("/register",[RegisterController::class,'store'])->name('register.store');

Route::prefix('account')->group(function () {
    Route::middleware('auth')->group(function () {
        Route::get("dashboard",[DashboardController::class,'member'])->name('member.dashboard'); 
        Route::resource("profile", ProfileController::class);


        Route::resource("berkas", BerkasUserController::class);

        
        Route::get("logout",[AuthController::class,'LogoutMember'])->name('logout.member');
        
    });
});

Route::prefix('admin')->group(function () {
    Route::middleware('operator')->group(function () {
        Route::get("dashboard",[DashboardController::class,'admin'])->name('admin.dashboard');
        Route::get("logout",[AuthController::class,'LogoutOperator'])->name('logout.operator');
        Route::resource("pengaturan-account", ProfileOperator::class);
        Route::resource("permohonan",PermohonanController::class);
        Route::resource("perizinan",PerizinanFileController::class);
    });
});



