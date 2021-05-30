<?php


use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\BorrowerController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/sogand', function () {
    return view('sogand');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');





Route::get('books',[BookController::class, 'index'])->name('books');
Route::post('books',[BookController::class,'store'])->name('books.store');
Route::get('books/edit/{id}',[BookController::class,'edit'])->name('books.edit');
Route::patch('books/update/{id}',[BookController::class,'update'])->name('books.update');
Route::delete('books/destroy/{id}',[BookController::class,'destroy'])->name('books.destroy');




Route::get('borrowers',[BorrowerController::class, 'index'])->name('borrowers');
Route::post('borrowers',[BorrowerController::class,'store'])->name('borrowers.store');
Route::get('borrowers/edit/{id}',[BorrowerController::class,'edit'])->name('borrowers.edit');
Route::patch('borrowers/update/{id}',[BorrowerController::class,'update'])->name('borrowers.update');
Route::delete('borrowers/destroy/{id}',[BorrowerController::class,'destroy'])->name('borrowers.destroy');



Route::get('authors',[AuthorController::class, 'index'])->name('authors');
Route::post('authors',[AuthorController::class,'store'])->name('authors.store');
Route::get('authors/edit/{id}',[AuthorController::class,'edit'])->name('authors.edit');
Route::patch('authors/update/{id}',[AuthorController::class,'update'])->name('authors.update');
Route::delete('authors/destroy/{id}',[AuthorController::class,'destroy'])->name('authors.destroy');



Route::get('borrows',[borrowController::class, 'index'])->name('borrows');
Route::post('borrows',[borrowController::class,'store'])->name('borrows.store');
Route::get('borrows/edit/{id}',[borrowController::class,'edit'])->name('borrows.edit');
Route::patch('borrows/update/{id}',[borrowController::class,'update'])->name('borrows.update');
Route::delete('borrows/destroy/{id}',[borrowController::class,'destroy'])->name('borrows.destroy');
