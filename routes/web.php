<?php

use Illuminate\Support\Facades\Route;


// laravel側ではなくvue側でルーティングする
Route::get('/{any}', function () {
    return view('welcome');
})
->where('any','.*');