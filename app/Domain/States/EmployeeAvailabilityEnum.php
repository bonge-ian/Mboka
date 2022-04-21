<?php

declare(strict_types=1);

namespace App\Domain\States;

use App\Domain\States\Concerns\GetValues;

enum EmployeeAvailabilityEnum : string
{
    use GetValues;

    case ONSITE = 'on-site';
    case HYBRID = 'hybrid';
    case REMOTE = 'remote';
}
