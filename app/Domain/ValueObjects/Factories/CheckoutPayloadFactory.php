<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects\Factories;

use App\Domain\ValueObjects\Flutterwave\CheckoutPayload;
use App\Domain\ValueObjects\Factories\Contracts\ValueObjectFactory;

class CheckoutPayloadFactory implements ValueObjectFactory
{
    public static function make(array $attributes): CheckoutPayload
    {
        return new CheckoutPayload(
            amount: $attributes['amount'],
            redirectUrl: $attributes['redirectUrl'],
            customer: $attributes['customer'],
            meta: $attributes['meta'] ?? null,
            customizations: $attributes['customizations'] ?? null,
        );
    }
}
