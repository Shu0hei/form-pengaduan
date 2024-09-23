<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('posts', PostController::class);

Route::get('generate-pdf', [App\Http\Controllers\PostController::class, 'generatePdf']);
Route::get('/posts/{id}/download-pdf', [PostController::class, 'downloadPDF'])->name('posts.downloadPDF');
