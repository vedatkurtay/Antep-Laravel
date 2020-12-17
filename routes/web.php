<?php

use App\Http\Controllers\ExcelDownloadController;
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
Route::get('/export-products',[ExcelDownloadController::class, 'downloadExcel'])->name('product.export');

/*
 * Product İşlemleri
 *
 */
//Route::get('/urun-ekle',[ProductController::class,'create'])->name('product.create');
//Route::post('/save-product',[ProductController::class,'store'])->name('product.save');
//Route::get('/show-product',[ProductController::class,'index'])->name('product.show');


/* Slider işlemleri */
Route::get('/show-sliders',[\App\Http\Controllers\SliderController::class, 'index'])->name('slider.index');
Route::get('/delete-sliders/{id}',[\App\Http\Controllers\SliderController::class,'destroy'])
    ->where(array('id' => '[0-9]+'))->name('destroy.slider');

Route::post('/import-categories',[\App\Http\Controllers\CategoryController::class, 'import'])
    ->name('category.import');

Route::get('/upload-categories',[\App\Http\Controllers\CategoryController::class,'upload'])
    ->name('category.upload');

Route::get('/paginate', [ProductController::class,'index']);

/* SMS */
Route::get('/login', [\App\Http\Controllers\SmsController::class, 'index'])->name('sms.index');
Route::get('/forgot', [\App\Http\Controllers\SmsController::class, 'forgot'])->name('forgot.page');
Route::post('/reset', [\App\Http\Controllers\SmsController::class, 'Reset'])->name('reset.password');
