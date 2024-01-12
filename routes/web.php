<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('layout');
// });
Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard.index');
Route::get('/makanan', [HomeController::class, 'makanan'])->name('makanan.index');
Route::get('/detMakanan', [HomeController::class, 'detailMakanan'])->name('makanan.detail');
Route::get('/minuman', [HomeController::class, 'minuman'])->name('minuman.index');
Route::get('/cemilan', [HomeController::class, 'cemilan'])->name('cemilan.index');
