<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;

Route::get('/', WelcomeController::class);
Route::resource('services', \App\Http\Controllers\ServiceController::class)
    ->only('show')
    ->names([
        'show' => 'services.show'
    ]);

Route::redirect('/login', '/admin/login')->name('login');