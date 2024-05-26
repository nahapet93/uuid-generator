<?php

use Illuminate\Support\Facades\Route;

Route::get('{any?}', function () {
    return view('check-form');
})->where('any', '.*');
