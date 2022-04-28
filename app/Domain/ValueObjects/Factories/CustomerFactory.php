<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects\Factories;

use App\Domain\ValueObjects\Customer;
use App\Domain\ValueObjects\Factories\Contracts\ValueObjectFactory;

class CustomerFactory implements ValueObjectFactory
{
    public static function make(array $attributes): Customer
    {
        return new Customer(
            name: $attributes['name'],
            email: $attributes['email'],
            phone: $attributes['phone']
        );
    }
}
