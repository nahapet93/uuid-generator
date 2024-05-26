<?php

use App\Http\Controllers\Api\UuidController;
use Illuminate\Support\Facades\Route;

Route::get('/uuid/list', [UuidController::class, 'list'])->name('uuid-list');
Route::post('/uuid/generate', [UuidController::class, 'generate'])->name('uuid-generate');
Route::get('/uuid/retrieve/{id}', [UuidController::class, 'retrieve'])->name('uuid-retrieve');
Route::delete('/uuid/delete/{id}', [UuidController::class, 'delete'])->name('uuid-delete');
