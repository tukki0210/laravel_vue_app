<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Laravel8から使うコントローラのuseが必要
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoanController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;


// 未ログインでも有効
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LogoutController::class, 'logout']);

// ログイン後のみ有効

// 単品のみの場合
Route::middleware('auth:sanctum')->apiResource('/users', UserController::class);

// 複数まとめる場合
Route::group(["middleware" => ["auth:sanctum"]], function () {

    Route::get('/books/getRakutenAPI', [BookController::class, 'getRakutenAPI']);
    Route::post('/books/search', [BookController::class, 'search']);
    Route::apiResource('/books', BookController::class);
});

// 単品の場合
Route::middleware('auth:sanctum')->apiResource('/loans', LoanController::class);
