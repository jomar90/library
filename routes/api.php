<?php

use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\ExternalBookController;
use Illuminate\Support\Facades\Route;

Route::apiResource('books', BookController::class);

Route::get('/external-books', [ExternalBookController::class, 'search']);
