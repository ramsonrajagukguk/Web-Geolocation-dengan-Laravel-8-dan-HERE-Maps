<?php

use App\Http\Controllers\Admin\Beranda;
use App\Http\Controllers\Admin\BooksController;
use App\Http\Controllers\Admin\Buku;
use App\Http\Controllers\Admin\Datacontroller;
use App\Http\Controllers\Admin\PenulisController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\Admin\SpaceController;
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

Route::get('/', [BerandaController::class,'index'])->name('home');
Route::get('/buku/{id}', [BerandaController::class,'show'])->name('buku');
Route::post('/buku/pinjam/{id}', [BerandaController::class,'pinjam'])->name('buku.pinjam')->middleware('auth');



Route::middleware('auth')-> group(function () {
    Route::get('/admin', [Beranda::class,'index'])->name('beranda');

    Route::resource('admin/penulis', PenulisController::class);
    Route::resource('admin/buku', BooksController::class);

    Route::get('/admin/buku', [Buku::class,'index'])->name('buku');
    Route::get('/admin/penulis', [Penulis::class,'index'])->name('penulis');
    Route::delete('/admin/penulis/{id}', [Penulis::class,'destroy'])->name('penulis.destroy');

    Route::get('/admin/penulis/data', [Datacontroller::class,'penulis'])->name('penulis.data');

    Route::get('/admin/daftarpinjam',[Beranda::class,'daftar_pinjam'])->name('daftarpinjam');
    Route::get('/admin/listpinjam',[Beranda::class,'list_pinjam'])->name('listpinjam');
    Route::patch('/admin/returnBook/{id}',[Beranda::class,'returnBook'])->name('returnBook');
    
  
    Route::resource('/admin/space',SpaceController::class);

    
    
});


// Route::get('/admin', function () {
//     return view('admin.beranda');
// })->name('admin')->middleware('auth');


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');