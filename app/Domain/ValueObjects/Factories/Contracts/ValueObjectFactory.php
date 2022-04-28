<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects\Factories\Contracts;

use App\Domain\ValueObjects\Contracts\ValueObject;

interface ValueObjectFactory
{
    public static function make(array $attributes) : ValueObject;
}
