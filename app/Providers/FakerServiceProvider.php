<?php

namespace App\Providers;

use Faker\{Factory, Generator};
use Mmo\Faker\LoremSpaceProvider;
use Illuminate\Support\ServiceProvider;
use App\Faker\Provider\en_KE\PhoneNumber;
use App\Faker\Provider\en_KE\{Address, Internet, Person};

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
            $faker->addProvider(new LoremSpaceProvider($faker));

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
