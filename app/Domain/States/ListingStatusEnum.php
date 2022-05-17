<?php

declare(strict_types=1);

namespace App\Domain\States;

use App\Domain\States\Concerns\GetValues;

enum ListingStatusEnum: string
{
    use GetValues;

    case ACTIVE = 'active';
    case PENDING = 'pending';
    case CLOSED = 'closed';

    public function color(): string
    {
        return match ($this) {
            ListingStatusEnum::ACTIVE => 'success',
            ListingStatusEnum::PENDING => 'warning',
            ListingStatusEnum::CLOSED => 'muted',
        };
    }
}
