<?php

use App\Http\Controllers\exams_cont_admin;
use App\Http\Controllers\questions_cont_admin;
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

Route::group(['middleware' => ['auth', isAdmin_middle::class], 'prefix' => 'admin'], function () {
    Route::get('exams/{id}', [exams_cont_admin::class, 'destroy'])->whereNumber('id')->name('exams.destroy');
    Route::get('exam/{exam_id}/questions/{id}', [questions_cont_admin::class, 'destroy'])->whereNumber('id')->name('questions.destroy');
    Route::resource('exams', exams_cont_admin::class);
    Route::resource('exam/{exam_id}/questions', questions_cont_admin::class);
});
