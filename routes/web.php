<?php

use App\Http\Controllers\Dashboard;
use App\Http\Livewire\CreateListing;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ShowListingController;
use App\Http\Livewire\Dashboard\ManageListings;
use App\Http\Controllers\ApplyListingController;

// Route::view('/', 'dash');

// Route::get('/', CreateListing::class);

Route::prefix('dashboard')
    ->name('dashboard.')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('/', Dashboard\IndexController::class)->name('index');
        Route::get('/listings', ManageListings::class)->name('listings.index');
        Route::get('/listings/{listing:slug}', Dashboard\Listings\ShowListingController::class)->name('listings.show');
        Route::get('/analytics', Dashboard\AnalyticsController::class)->name('analytics');
        Route::get('/transactions', Dashboard\TransactionsController::class)->name('transactions');
    });


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
