<?php
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\PageController;

Route::get('/', [ArticleController::class, 'index'])->name('homepage');
Route::get('/article/{id}', [ArticleController::class, 'show'])->name('article.show');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/admin', [PageController::class, 'admin'])->name('admin');

Route::prefix('admin')->group(function () {
    Route::resource('categories', CategoryController::class);
    Route::resource('tags', TagController::class);
    Route::resource('articles', ArticleController::class);
});
