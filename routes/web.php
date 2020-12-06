<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProjeController;
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

/*
Route::get('/', function () {
    //return view('welcome');
    return view('products.index');
});
*/
Route::get('/', [ProjeController::class, 'index']);
//Route::view('/', 'layouts.master');

Route::get('/hakkimda',[HomeController::class, 'showMyAbout']);
Route::get('/kullanicilar',[HomeController::class, 'showUsers']);
Route::get('/urunler',[HomeController::class, 'showProducts']);
Route::get('/satislar',[HomeController::class, 'showSales']);

/*
 * Product İşlemleri
 *
 */
//Route::get('/urun-ekle',[ProductController::class,'create'])->name('product.create');
//Route::post('/save-product',[ProductController::class,'store'])->name('product.save');
//Route::get('/show-product',[ProductController::class,'index'])->name('product.show');
