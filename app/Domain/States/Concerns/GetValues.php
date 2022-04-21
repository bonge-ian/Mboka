<?php

declare(strict_types=1);

namespace App\Domain\States\Concerns;

trait GetValues
{
    public static function values(): array
    {
        return array_column(self::cases(), 'value');
    }
}
