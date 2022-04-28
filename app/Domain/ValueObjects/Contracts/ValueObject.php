<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects\Contracts;

interface ValueObject
{
    public function toArray() : array;

}
