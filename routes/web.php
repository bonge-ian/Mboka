<?php

use App\Http\Livewire\CreateListing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShowListingController;
use App\Http\Controllers\ApplyListingController;

Route::view('/', 'dash');

// Route::get('/', CreateListing::class);

Route::view('dashboard', 'dashboard')
    ->name('dashboard')
    ->middleware(['auth', 'verified']);

Route::prefix('user')->middleware(['auth', 'verified'])->group(function () {
    Route::view('profile', 'profile.show');
});

Route::prefix('listing')->name('listing.')->group(function () {
    Route::get('create', CreateListing::class)->name('create');
    Route::get('{listing:slug}', ShowListingController::class)->name('show');
    Route::get('{listing:slug}/apply', ApplyListingController::class)->name('apply');
});

Route::get('payment/verification', PaymentController::class)
    ->name('payment.verification');
