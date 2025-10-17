<?php

use App\Http\Controllers\Admin\PropertyController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/', function () {
    return Inertia::render('Welcome');
})->name('home');

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('property', PropertyController::class)->except('show');
});

require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
