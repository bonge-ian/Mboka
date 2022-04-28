<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects;

use App\Domain\ValueObjects\Contracts\ValueObject;

class Customer implements ValueObject
{
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly ?string $phone = null,
    ) {
    }

    public function toArray() : array
    {
        return collect($this)->toArray();
    }
}
