<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

$idRegex = '[0-9]+';
$slugRegex = '[a-z0-9\-]+';

Route::get('dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::get('/', [HomeController::class, 'index']);
Route::get('/biens', [App\Http\Controllers\PropertyController::class, 'index'])->name('property.index');
Route::get('/biens/{slug}-{property}', [App\Http\Controllers\PropertyController::class, 'show'])->name('property.show')->where([
    'property' => $idRegex,
    'slug' => $slugRegex,
]);
Route::post('/biens/{property}/contact', [App\Http\Controllers\PropertyController::class, 'contact'])->name('property.contact')->where([
    'property' => $idRegex
]);
Route::prefix('admin')->name('admin.')->group(function () {
    Route::resource('property', App\Http\Controllers\Admin\PropertyController::class)->except('show');
    Route::resource('option', OptionController::class)->except('show');
});

require __DIR__ . '/settings.php';
require __DIR__ . '/auth.php';
