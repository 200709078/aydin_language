<?php

use App\Http\Middleware\isAdmin_middle;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::group([
    'middleware' => ['auth', isAdmin_middle::class],
    'prefix'=>'admin'
], function () {
    Route::get('deneme', function () {
        return "middleware/prefix testi";
    });
});
