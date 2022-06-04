<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects\Flutterwave;

use Carbon\Carbon;
use App\Domain\Helpers\Money;
use App\Domain\ValueObjects\Contracts\ValueObject;

class TransactionResponse implements ValueObject
{
    public function __construct(
        public readonly int $id,
        public readonly string $transactionCode,
        public readonly Money $amount,
        public readonly string $status,
        public readonly string $paymentType,
        public readonly Carbon $created_at,
    ) {
    }

    public function toArray(): array
    {
        return collect($this)->toArray();
    }
}
