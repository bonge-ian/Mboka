<?php

namespace App\Providers;

use App\Models\User;
use App\Models\Listing;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define(
            ability: 'can-edit-listing',
            callback: fn (User $user, Listing $listing) => $user->id === $listing->user_id
        );
    }
}
