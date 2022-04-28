<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects\Factories;

use Carbon\Carbon; 
use App\Domain\ValueObjects\Flutterwave\TransactionPayload;
use App\Domain\ValueObjects\Factories\Contracts\ValueObjectFactory;

class TransactionPayloadFactory implements ValueObjectFactory
{
    public static function make(array $attributes): TransactionPayload
    {
        return new TransactionPayload(
            from: Carbon::parse($attributes['from']),
            to: Carbon::parse($attributes['to']),
            status: $attributes['status'],
            customerEmail: $attributes['customerEmail'],
            transactionCode: $attributes['transactionCode'],
            page: $attributes['page'],
        );
    }
}
