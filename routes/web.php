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

Route::get('/dashboard', function() {
    return view('admin.dashboard.index');
})->name('dashboard');

Route::get('/dashboard-login', function(){
    return view('admin.auth.login');
});

Route::get('/dashboard-menu', function(){
    return view('admin.menu.index');
})->name('dashboard-menu');

Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard.index');
Route::get('/makanan', [HomeController::class, 'makanan'])->name('makanan.index');
Route::get('/detMakanan', [HomeController::class, 'detailMakanan'])->name('makanan.detail');
Route::get('/minuman', [HomeController::class, 'minuman'])->name('minuman.index');
Route::get('/cemilan', [HomeController::class, 'cemilan'])->name('cemilan.index');
Route::get('/login', [HomeController::class, 'login'])->name('login.index');
Route::get('/register', [HomeController::class, 'register'])->name('login.index');
