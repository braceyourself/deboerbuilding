<?php

use Illuminate\Http\Request;
use App\Livewire\TestimonialsPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;

Route::get('/', WelcomeController::class);
Route::get('testimonials', TestimonialsPage::class)->name('testimonials');
Route::resource('services', \App\Http\Controllers\ServiceController::class)
    ->only('show')
    ->names([
        'show' => 'services.show'
    ]);

Route::redirect('/login', '/admin/login')->name('login');