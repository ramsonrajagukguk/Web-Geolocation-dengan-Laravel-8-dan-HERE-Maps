<?php

use App\Http\Controllers\Admin\Beranda;
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
    
});


// Route::get('/admin', function () {
//     return view('admin.beranda');
// })->name('admin')->middleware('auth');


Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');