<?php

use DanieleTulone\PostmanGenerator\Http\Controllers\PostmanController;
use Illuminate\Support\Facades\Route;

Route::get(
    'postman/download',
    [PostmanController::class, 'getCollection']
)->name('dev.postman.collection');
