<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DetailsController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Route;






// Route::get('/', function () {
//     return view('welcome');
// }); 

Route::get('/', [FrontController::class, 'index'])->name('front.index');

Route::get('/details/{article_news:slug}', [DetailsController::class, 'details'])->name('front.details');

Route::get('/category/{category:slug}', [CategoryController::class, 'category'])->name('front.category');

Route::get('/author/{author:slug}', [AuthorController::class, 'author'])->name('front.author');

Route::get('/search', [SearchController::class, 'search'])->name('front.search');
