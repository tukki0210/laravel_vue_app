<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Laravel8から使うコントローラのuseが必要
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;

// Laravel8から書き方が変更された
// apiに対応したrestfulにしておく
Route::apiResource('/books',BookController::class);

Route::apiResource('/users',UserController::class);