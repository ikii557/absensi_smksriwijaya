<?php

use App\Http\Controllers\GuruController;
use App\Http\Controllers\UserController;
use App\Models\User;
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

// data pengguna
Route::get('/copyan', function () {
    return view('copyan.copy');
});
Route::get('/dashboard', function () {
    return view('pages.dashboard');
});
Route::get('/ambilkamera', function () {
    return view('pages.kamera');
});


// data admin
Route::get('/dashboardadmin',[UserController::class, 'index'])->name('dashboardadmin');

Route::get('/dataadmin', [UserController::class, 'index']);



Route::get('/dashboardadmin', function () {
    return view('pagesadmin.dashboard');
});
Route::get('dokumentasiabsen', function () {
    return view('pagesadmin.dokumentasiabsen');
});
Route::get('datasiswa', function () {
    return view('pagesadmin.data.datasiswa');
});
Route::get('dataguru',[GuruController::class, 'index'])->name('dataguru');