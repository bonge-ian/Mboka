<?php

declare(strict_types=1);

namespace App\Http\Controllers\Dashboard\Concerns;

use App\Models\Payment;
use App\Domain\Helpers\Money;

trait TotalExpenditure
{
    protected function getTotalExpenditure(int $user_id): Money
    {
        return new Money(
            (float) Payment::query()
                ->where(
                    column: 'user_id',
                    operator: '=',
                    value: $user_id
                )
                ->sum(column: 'amount')
        );
    }
}
