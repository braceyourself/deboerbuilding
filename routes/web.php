<?php

use Illuminate\Http\Request;
use App\Livewire\ContactPage;
use App\Livewire\HistoryPage;
use App\Livewire\ServicesPage;
use App\Livewire\TestimonialsPage;
use App\Livewire\AboutPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\ServiceController;

Route::view('/', 'landing');

Route::get('testimonials', TestimonialsPage::class)->name('testimonials');
Route::get('about', AboutPage::class)->name('about');
Route::get('about/history', HistoryPage::class)->name('history');
Route::get('contact', ContactPage::class)->name('contact');
Route::get('services', ServicesPage::class)->name('services');

Route::resource('services', ServiceController::class)->only('show')->parameters(['services' => 'service:slug']);

Route::redirect('/login', '/admin/login')->name('login');