<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SlideController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;


Route::get('/', [Controller::class, 'home'])->name('page.app');
Route::get('contacts', [Controller::class, 'home'])->name('about');
Route::get('news', [Controller::class, 'home'])->name('posts');
Route::get('achizition', [Controller::class, 'home'])->name('achizition');

Route::get('/mainJs', [Controller::class, 'main'])->name('page.main');

Route::get('contactsJs', [Controller::class, 'about'])->name('aboutAjax');
Route::get('postJs/{id}', [Controller::class, 'post'])->name('postAjax');
Route::get('post/{id}', [Controller::class, 'home'])->name('post');

Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::post('/contact/{id}', [ContactController::class, 'update'])->name('contact.update');

Route::get('/achizition.index', [FileController::class, 'index'])->name('files.index');
Route::get('files/open/{id}', [FileController::class, 'openFile'])->name('files.open');
Route::get('storage/app/public/uploads/{id}', [SlideController::class, 'openFile'])->name('slide.open');

Route::middleware('auth')->group(function () {


    Route::post('/achizition', [FileController::class, 'store'])->name('files.store');
    Route::post('/files/{id}',  [FileController::class, 'update'])->name('files.update');
    Route::post('/slides/{id}',  [SlideController::class, 'update'])->name('slides.update');
    Route::post('/files_destroy/{id}', [FileController::class, 'destroy'])->name('files.destroy');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
