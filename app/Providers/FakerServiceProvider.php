<?php

namespace App\Providers;

use Faker\{Factory, Generator};
use App\Faker\Provider\en_KE\Person;
use App\Faker\Provider\en_KE\Address;
use App\Faker\Provider\en_KE\Internet;
use Illuminate\Support\ServiceProvider;
use App\Faker\Provider\en_KE\PhoneNumber;

class FakerServiceProvider extends ServiceProvider
{
    /**
     * @return void
     */
    public function register()
    {
        $this->app->singleton(Generator::class, function () {
            $faker = Factory::create('en_KE');

            $faker->addProvider(new Address($faker));
            $faker->addProvider(new Person($faker));
            $faker->addProvider(new PhoneNumber($faker));
            $faker->addProvider(new Internet($faker));
            return $faker;
        });
    }

    /**
     * @return void
     */
    public function boot()
    {
        //
    }
}
