<?php

use App\Http\Controllers\Admin\OptionController;
use Illuminate\Support\Facades\Route;

$idRegex = '[0-9]+';
$slugRegex = '[a-z0-9\-]+';

Route::name('api')->group(function () {

    Route::get('biens', [App\Http\Controllers\Api\Admin\PropertyController::class, 'index']);

    Route::prefix('admin')/*->middleware('auth')*/->group(function () {
        Route::resource('property', App\Http\Controllers\Api\Admin\PropertyController::class)->except('show');
//        Route::resource('option', OptionController::class)->except('show');
    });
});
