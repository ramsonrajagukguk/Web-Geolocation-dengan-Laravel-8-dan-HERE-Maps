<?php

use App\Http\Controllers\Admin\Beranda;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Admin\SpaceController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


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

Route::get('/', [BerandaController::class,'index'])->name('home');
Route::get('/space/{space}', [BerandaController::class,'details'])->name('space.details');
Route::post('/buku/pinjam/{id}', [BerandaController::class,'pinjam'])->name('buku.pinjam')->middleware('auth');



Route::middleware('verified')-> group(function () {
    Route::get('/admin', [Beranda::class,'index'])->name('beranda');
    Route::resource('/admin/space',SpaceController::class);
    Route::get('/admin/browse/spaces', [SpaceController::class,'browse'])->name('browse');
    
});

Auth::routes(['verify' => true]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');