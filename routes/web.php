<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();
Route::post('/logout',  [AuthController::class, 'logout']);
Route::post('/logout-admin',  [UserController::class, 'logout']);

Route::get('/error-akses', function(){
    return view('error');
})->name('error-akses');

Route::middleware(['auth','user_login:admin'])->group(function(){
    Route::get('/dashboard', [UserController::class, 'index'])->name('dashboard');

    Route::get('/dashboard-menu', [DashboardController::class, 'getAllMenu'])->name('listmenu');
    Route::get('/dashboard-menu/create', [DashboardController::class, 'create'])->name('listmenu.create');
    Route::get('/dashboard-menu/detail/{menu:slug}', [DashboardController::class, 'show'])->name('listmenu.show');
    Route::put('/dashboard-menu/edit/{menu:slug}', [DashboardController::class, 'update'])->name('listmenu.update');
    Route::get('/dashboard-menu/edit/{menu:slug}', [DashboardController::class, 'showDetail'])->name('listmenu.update');
    Route::delete('/dashboard-menu/delete/{menu:slug}', [DashboardController::class, 'destroy'])->name('listmenu.destroy');
    Route::post('/dashboard-menu/create', [DashboardController::class, 'store'])->name('listmenu');

    Route::get('/dashboard-menu/create/checkSlug', [DashboardController::class, 'checkSlug'])->name('checkSlug');

    

});
Route::middleware(['auth','user_login:user'])->group(function(){
    Route::post('/cemilan/{title}', [MenuController::class, 'rate'])->name('cemilan.rate');

});

Route::get('/login', [AuthController::class, 'index'])->middleware('guest')->name('login');;
Route::post('/login',  [AuthController::class, 'authenticate']);
Route::get('/register', [AuthController::class, 'register'])->middleware('guest')->name('register');
Route::post('/register', [AuthController::class, 'store']);

Route::get('/', [MenuController::class, 'dashboard'])->name('dashboard.index');
Route::get('/makanan', [MenuController::class, 'makanan'])->name('makanan.index');
Route::get('/makanan/{title}', [MenuController::class, 'show'])->name('makanan.detail');
Route::post('/makanan/{title}', [MenuController::class, 'rate'])->name('makanan.rate');

Route::get('/minuman', [MenuController::class, 'minuman'])->name('minuman.index');
Route::get('/minuman/{title}', [MenuController::class, 'show'])->name('minuman.detail');
Route::post('/minuman/{title}', [MenuController::class, 'rate'])->name('minuman.rate');

Route::get('/cemilan', [MenuController::class, 'cemilan'])->name('cemilan.index');
Route::get('/cemilan/{title}', [MenuController::class, 'show'])->name('cemilan.detail');


Route::get('/rating/{id}', [MenuController::class, 'rateDetail'])->name('rating.detail');


Route::get('/{title}/rating', [MenuController::class, 'showMore'])->name('rating.index');
// Route::get('/rating/{title}', [MenuController::class, 'showMore'])->name('rating.index');

Route::get('/search', [MenuController::class, 'search']);



Route::get('/dashboard-login', function () {
    return view('admin.auth.login');
})->name('dashboard-login');

// Route::get('/dashboard-menu', function () {
//     return view('admin.menu.index');
// })->name('dashboard-menu');

// Route::get('/', [HomeController::class, 'dashboard'])->name('dashboard.index');
// Route::get('/makanan', [HomeController::class, 'makanan'])->name('makanan.index');
// Route::get('/detMakanan', [HomeController::class, 'detailMakanan'])->name('makanan.detail');
// Route::get('/minuman', [HomeController::class, 'minuman'])->name('minuman.index');
// Route::get('/detMinuman', [HomeController::class, 'detailMinuman'])->name('minuman.detail');
// Route::get('/cemilan', [HomeController::class, 'cemilan'])->name('cemilan.index');
// Route::get('/detCemilan', [HomeController::class, 'detailCemilan'])->name('cemilan.detail');
// Route::get('/login', [HomeController::class, 'login'])->name('login.index');
// Route::get('/register', [HomeController::class, 'register'])->name('register.index');
