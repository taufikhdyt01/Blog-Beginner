<?php

use App\Http\Controllers\ArticlesController;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Route;

Route::controller(PageController::class)->group(function(){
    Route::get('/', 'home')->name('home');
    Route::get('/about', 'about')->name('about');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::controller(PageController::class)->group(function() {
        Route::get('/dashboard', 'dashboard')->name('dashboard');
    });

    Route::controller(TagsController::class)->group(function() {
        Route::get('/tags', 'index')->name('tags.show');
        Route::get('/tags/create', 'create')->name('tags.create');
        Route::get('/tags/edit/{tag}', 'edit')->name('tags.edit');
        Route::post('/tags', 'store')->name('tags.store');
        Route::put('/tags/{tag}', 'update')->name('tags.update');
        Route::delete('/tags/{tag}', 'delete')->name('tags.delete');
    });

    Route::controller(ArticlesController::class)->group(function() {
        Route::get('/articles', 'index')->name('articles.show');
        Route::get('/articles/{article}', 'show')->name('articles.detail');
        Route::get('/articles/create', 'create')->name('articles.create');
        Route::get('/articles/edit/{article}', 'edit')->name('articles.edit');
        Route::post('/articles', 'store')->name('articles.store');
        Route::put('/articles/{article}', 'update')->name('articles.update');
        Route::delete('/articles/{article}', 'delete')->name('articles.delete');
        Route::delete('/articles/{article}/delete/{tag}', 'deleteTag')->name('articles.tag.delete');
    });

    Route::controller(CategoriesController::class)->group(function() {
        Route::get('/categories', 'index')->name('categories.show');
        Route::get('/categories/create', 'create')->name('categories.create');
        Route::get('/categories/edit/{category}', 'edit')->name('categories.edit');
        Route::post('/categories', 'store')->name('categories.store');
        Route::put('/categories/{category}', 'update')->name('categories.update');
        Route::delete('/categories/{category}', 'delete')->name('categories.delete');
    });
});

require __DIR__.'/auth.php';
