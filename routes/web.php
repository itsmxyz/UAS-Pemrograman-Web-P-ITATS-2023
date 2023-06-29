<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SekretarisController;
use App\Http\Controllers\SenseiController;
use App\Http\Controllers\SiswaController;
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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/aa', [\App\Models\SiswaModel::class,'insertSiswa']);
Route::get('/ab', [\App\Models\DataKelasQuery::class,'getAllKelas']);

Route::middleware('guest')->group(function () {
    Route::get('/schale', [AdminController::class, 'loginPage'])->name('login.schale');
    Route::get('/login-choice', function (){ return view('page2-login.login-choice'); });
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::get('/login-sensei', function (){ return view('page2-login.login-sensei'); })->name('sensei.login');
    Route::get('/login-sekretaris', function (){ return view('page2-login.login-sekretaris'); })->name('sekretaris.login');
    Route::post('/schale-auth', [LoginController::class, 'authSchale'])->name('auth.schale');
    Route::post('/sensei-auth', [LoginController::class, 'authSensei'])->name('auth.sensei');
    Route::post('/sekretaris-auth', [LoginController::class, 'authSekretaris'])->name('auth.sekretaris');
});

Route::middleware('isAuth')->group(function (){
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

Route::middleware('schale')->group(function () {
    Route::get('/schale/dashboard', [AdminController::class, 'index'])->name('schale.dashboard');
    Route::get('/schale/sensei', [AdminController::class, 'getDataSensei'])->name('schale.sensei');
    Route::get('/schale/sekretaris', [AdminController::class, 'getDataSekretaris'])->name('schale.sekretaris');
    Route::get('/schale/siswa', [AdminController::class, 'getDataSiswa'])->name('schale.siswa');
    Route::get('/schale/kelas/all', [AdminController::class,'getDataKelas'])->name('schale.kelas');
    Route::get('/schale/kelas/{id_kelas}', [AdminController::class,'getDataKelas'])->name('schale.kelas-view');
    Route::post('/schale/sensei/create-sensei', [SenseiController::class, 'store'])->name('schale.sensei-create');
    Route::post('/schale/sensei/update-sensei', [SenseiController::class, 'update'])->name('schale.sensei-update');
    Route::post('/schale/sensei/delete-sensei', [SenseiController::class, 'destroy'])->name('schale.sensei-delete');
    Route::post('/schale/sensei/reset-sensei',[SenseiController::class, 'resetPassword'])->name('schale.sensei-reset');
    Route::post('/schale/sekretaris/create-sekretaris', [SekretarisController::class, 'store'])->name('schale.sekretaris-create');
    Route::post('/schale/sekretaris/update-sekretaris', [SekretarisController::class, 'update'])->name('schale.sekretaris-update');
    Route::post('/schale/sekretaris/delete-sekretaris', [SekretarisController::class, 'destroy'])->name('schale.sekretaris-delete');
    Route::post('/schale/sekretaris/reset-sekretaris', [SekretarisController::class, 'resetPassword'])->name('schale.sekretaris-reset');
});


Route::middleware('auth:sensei')->group(function (){
    Route::get('/sensei/dashboard', [SenseiController::class, 'index'])->name('sensei.dashboard');
});

Route::middleware('auth:sekretaris')->group(function (){
    Route::get('/sekretaris/dashboard', [SekretarisController::class, 'index'])->name('sekretaris.dashboard');
});
