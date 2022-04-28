<?php

use App\Http\Livewire\CreateListing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Services\Flutterwave\CheckoutService;

// Route::view('/', 'demo');

Route::get('/', CreateListing::class);

Route::view('dashboard', 'dashboard')
    ->name('dashboard')
    ->middleware(['auth', 'verified']);

Route::prefix('user')->middleware(['auth', 'verified'])->group(function () {
    Route::view('profile', 'profile.show');
});

Route::get('payment/verification', PaymentController::class)
    ->name('payment.verification');
