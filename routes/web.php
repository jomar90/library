<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\SessionController;
use App\Mail\BookCreated;
use App\Models\Book;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;



// Route::get('/', [PageController::class, 'home'])->name('home');
// Route::get('/about', [PageController::class, 'about'])->name('about');

// Route::get('test', function () {
//     Mail::to('mjomar1990@gmail.com')->send(new BookCreated());

//     return 'Email sent';
// });

Route::view('/', 'home');
Route::view('/about', 'about');

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('books/create', [BookController::class, 'create'])->middleware('auth');
Route::post('/books', [BookController::class, 'store'])->middleware('auth');
Route::get('/books/{book}', [BookController::class, 'show']);

Route::get('/books/{book}/edit', [BookController::class, 'edit'])
    ->middleware(['auth', 'can:view,book']);


Route::patch('/books/{book}', [BookController::class, 'update'])->middleware('auth');
Route::delete('/books/{book}', [BookController::class, 'destroy'])->middleware('auth');

Route::get('/register', [RegisterController::class, 'create']);
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/publishers', [PublisherController::class, 'index']);
Route::get('/publishers/create', [PublisherController::class, 'create'])->middleware('auth');
Route::post('/publishers', [PublisherController::class, 'store'])->middleware('auth');
Route::get('/publishers/{publisher}', [PublisherController::class, 'show']);
Route::get('/publishers/{publisher}/edit', [PublisherController::class, 'edit'])
    ->middleware(['auth', 'can:edit,publisher']);

Route::patch('/publishers/{publisher}', [PublisherController::class, 'update']);
Route::delete('/publishers/{publisher}', [PublisherController::class, 'destroy']);


Route::get('/login', [SessionController::class, 'create'])->name('login');
Route::post('/login', [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);
