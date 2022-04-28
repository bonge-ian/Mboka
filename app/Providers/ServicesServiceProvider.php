<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Services\Flutterwave\CheckoutService;
use App\Services\Flutterwave\TransactionService;

class ServicesServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register(): void
    {
        $this->app->singleton(
            abstract: CheckoutService::class,
            concrete: fn () => new CheckoutService(
                url: config('services.flutterwave.base_url'),
                token: config('services.flutterwave.secret'),
                timeout: config('services.flutterwave.timeout'),
                retryTimes: config('services.flutterwave.retry_times'),
                retryInterval: config('services.flutterwave.retry_interval'),
            )
        );

        $this->app->singleton(
            abstract: TransactionService::class,
            concrete: fn () => new TransactionService(
                url: config('services.flutterwave.base_url') . 'transactions/',
                token: config('services.flutterwave.secret'),
                timeout: config('services.flutterwave.timeout'),
                retryTimes: config('services.flutterwave.retry_times'),
                retryInterval: config('services.flutterwave.retry_interval'),
            )
        );
    }

    /**
     * @return void
     */
    public function boot(): void
    {
        //
    }
}
