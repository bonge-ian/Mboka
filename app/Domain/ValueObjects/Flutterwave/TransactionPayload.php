<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects\Flutterwave;

use Carbon\Carbon;
use App\Domain\ValueObjects\Customer;
use App\Domain\ValueObjects\Contracts\ValueObject;

class TransactionPayload implements ValueObject
{
    public function __construct(
        public readonly Carbon $from,
        public readonly Carbon $to,
        public readonly ?string $status = null,
        public readonly ?string $customerEmail = null,
        public readonly ?string $transactionCode = null,
        public readonly ?int $page = null,
    )
    { }

    public function toArray() : array
    {
        return collect($this)->toArray();
    }
}
