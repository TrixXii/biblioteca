<?php

use App\Http\Controllers\BookController;
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


Route::get('/' , [BookController::class, 'index'])->name('books');

Route::get('/books/{id}', [BookController::class, 'show'])->name('show');

Route::get('/booksCreate', [BookController::class, 'create'])->name('create');

Route::post('/books', [BookController::class, 'store'])->name('store');

Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('edit');

Route::put('/books/{id}', [BookController::class, 'update'])->name('update');

Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('destroy');

