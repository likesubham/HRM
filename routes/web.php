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
require __DIR__.'/member.php';
require __DIR__.'/student.php';
require __DIR__.'/staff.php';

Route::middleware(['auth', 'verified'])->group(function () {
    // Routes that require authentication and verification
    Route::get('/users', function () { return 'Users Page'; })->name('users');
    Route::get('/settings/general', function () { return 'General Settings Page'; })->name('settings.general');
    Route::get('/settings/users', function () { return 'User Settings Page'; })->name('settings.users');
});
