<?php

use App\Http\Controllers\Admin\Beranda;
use App\Http\Controllers\Admin\Buku;
use App\Http\Controllers\Admin\Datacontroller;
use App\Http\Controllers\Admin\Penulis;
use Illuminate\Support\Facades\Route;


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

Route::get('/', function () {
    return view('welcome');
});




Route::middleware('auth')-> group(function () {
    Route::get('/admin', [Beranda::class,'index'])->name('beranda');
    Route::get('/admin/buku', [Buku::class,'index'])->name('buku');
    Route::get('/admin/penulis', [Penulis::class,'index'])->name('penulis');
    Route::delete('/admin/penulis/{penulis}', [Penulis::class,'destroy'])->name('penulis.destroy');

    Route::get('/admin/penulis/data', [Datacontroller::class,'penulis'])->name('penulis.data');
    
});


// Route::get('/admin', function () {
//     return view('admin.beranda');
// })->name('admin')->middleware('auth');


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');