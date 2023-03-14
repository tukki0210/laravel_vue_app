<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Laravel8から使うコントローラのuseが必要
use App\Http\Controllers\BookController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoanController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;



Route::get('/books/getRakutenAPI', [BookController::class, 'getRakutenAPI']);

// Laravel8から書き方が変更された
// apiに対応したrestfulにしておく

// apiResourceはget,post,put,deletに対応したルーティングを自動で生成する
Route::apiResource('/books',BookController::class);

// 教科書P45などのLaravel6の書き方から変化している
// Laravel6 Route::get('/book',BookController@index);

Route::post('/books/search', [BookController::class, 'search']);

Route::apiResource('/users',UserController::class);

Route::apiResource('/loans',LoanController::class);

Route::post('/login',[LoginController::class,'login']);
Route::post('/logout',[LogoutController::class,'logout']);