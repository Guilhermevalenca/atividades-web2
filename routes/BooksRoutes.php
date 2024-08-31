<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PublisherController;
use Illuminate\Support\Facades\Route;

Route::resource('books', BookController::class);

Route::resource('authors', AuthorController::class);

Route::resource('categories', CategoryController::class);

Route::resource('publishers', PublisherController::class);

