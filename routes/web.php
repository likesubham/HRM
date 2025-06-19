<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Main Application Routes
Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }

    return redirect()->route('login');
})->name('welcome');

// Include other route files
require __DIR__.'/auth.php';
require __DIR__.'/dashboard.php';

Route::middleware(['auth', 'verified'])->group(function () {
    // Routes that require authentication and verification
});
