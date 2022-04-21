<?php

declare(strict_types=1);

namespace App\Domain\States;

use App\Domain\States\Concerns\GetValues;

enum ListingTypeEnum : string
{
    use GetValues;

    case FULLTIME = 'full-time';
    case CONTRACT = 'contract';
    case INTERNSHIP = 'internship';
    case PARTTIME = 'part-time';
    case TEMPORARY = 'temp';
}
