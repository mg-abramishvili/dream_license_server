<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\KeyController;
use App\Http\Controllers\ProgramController;

Route::get('/', function () {
    return redirect('/login');
});

// Ключи
Route::resource('/keys', KeyController::class)->middleware(['auth']);
Route::get('/keys/delete/{id}','App\Http\Controllers\KeyController@delete')->middleware(['auth']);

// Софт
Route::resource('/programs', ProgramController::class)->middleware(['auth']);
Route::get('/programs/delete/{id}','App\Http\Controllers\ProgramController@delete')->middleware(['auth']);

require __DIR__.'/auth.php';
