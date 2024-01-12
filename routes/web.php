<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
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

Route::group(['middleware' => 'auth'], function () {
    Route::post('/logout',  [AuthController::class, 'logout']);
});

Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');;
Route::post('/login',  [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store']);

Route::get('/', [MenuController::class, 'dashboard'])->name('dashboard.index');
Route::get('/makanan', [MenuController::class, 'makanan'])->name('makanan.index');
Route::get('/makanan/{title}', [MenuController::class, 'show'])->name('makanan.index');
Route::post('/makanan/{title}', [MenuController::class, 'rate'])->name('makanan.index');

Route::get('/minuman', [MenuController::class, 'minuman'])->name('minuman.index');
Route::get('/minuman/{title}', [MenuController::class, 'show'])->name('minuman.index');
Route::post('/minuman/{title}', [MenuController::class, 'rate'])->name('minuman.index');

Route::get('/cemilan', [MenuController::class, 'cemilan'])->name('cemilan.index');
Route::get('/cemilan/{title}', [MenuController::class, 'show'])->name('cemilan.index');
Route::post('/cemilan/{title}', [MenuController::class, 'rate'])->name('cemilan.index');