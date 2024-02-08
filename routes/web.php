<?php

use App\Http\Controllers\Controller;
use App\Http\Controllers\ProductImageController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [Controller::class, 'main'])->name('page.app');
//Route::get('/product/{$domain_name}', [Controller::class, 'openapp'])->name('request.product');
//
//Route::get('/productPage', [Controller::class, 'product'])->name('page.product');
//Route::get('/main', [Controller::class, 'main'])->name('page.main');

Route::get('/product/{domain_name}/', [Controller::class, 'product'])->name('request.product');

Route::get('products/{product}/images/create', [ProductImageController::class, 'create'])->name('product.images.create');
Route::post('products/{product}/images', [ProductImageController::class, 'store'])->name('product.images.store');








Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
