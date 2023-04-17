<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dev\PostmanController;

Route::get(
    'postman/download',
    [PostmanController::class, 'getCollection']
)->name('dev.postman.collection');
