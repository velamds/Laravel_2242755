
<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\BrandController;
// HOLA MUNDO //
Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Route::get('/products' , [ProductController::class , 'show']);
Route::get('/product/delete/{id}', [ProductController::class, 'delete'])->name('product.delete');
Route::get('/product/form/{id?}', [ProductController::class, 'form'])->name('product.form');
Route::post('/product/save', [ProductController::class, 'save'])->name('product.save');

Route::get('/brands' , [BrandController::class , 'show']);
Route::get('/brand/delete/{id}', [BrandController::class, 'delete'])->name('brand.delete');
Route::get('/brand/form/{id?}', [BrandController::class, 'form'])->name('brand.form');
Route::post('/brand/save', [BrandController::class, 'save'])->name('brand.save');

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Http\Controllers\InvoiceController;
Route::get('/invoices', [InvoiceController::class, 'show'])->name('invoices');
Route::get('/invoice/form', [InvoiceController::class, 'form'])->name('invoice.form');
Route::post('/invoice/save', [InvoiceController::class, 'save'])->name('invoice.save');