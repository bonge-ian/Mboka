<?php

declare(strict_types=1);

namespace App\Domain\Helpers;

class Prices
{
    public static function default() : Money
    {
        return new Money(config('mboka.pricing.default'));
    }

    public static function pinned() : Money
    {
        return new Money(config('mboka.pricing.pinned'));
    }

    public static function highlight() : Money
    {
        return new Money(config('mboka.pricing.highlight'));
    }

    public static function showLogo() : Money
    {
        return new Money(config('mboka.pricing.logo'));
    }

}
