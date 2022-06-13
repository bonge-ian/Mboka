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

        $this->defaultSeo();
    }

    protected function defaultSeo(): void
    {
        seo()
            ->site('Mboka — Meticulously architected web applications')
            ->title(
                default: 'Mboka — Get the right job you deserve',
                modify: fn (string $title) => 'Mboka - ' . $title
            )
            ->description(default: 'The only veracious and precise web platform to get your dream job. No superfluous sign-ups required.')
            ->image(default: fn () => asset('storage/assets/img/mboka-logo.svg'))
            ->twitterSite('bongeinc');
    }
}
