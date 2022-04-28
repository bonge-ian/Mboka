<?php

declare(strict_types=1);

namespace App\Domain\Helpers;

use NumberFormatter;

class Money
{
    protected NumberFormatter $formatter;

    public function __construct(protected float|int $price) 
    {
        $this->formatter = NumberFormatter::create('en_KE', NumberFormatter::CURRENCY);
    }

    public function amount(): float
    {
        return (float) $this->price;
    }


    public function formatted(): string
    {
        return $this->formatter->formatCurrency($this->price, 'KES');
    }

    public function toArray(): array
    {
        return [
            'amount' => $this->price,
            'formatted' => $this->formatted(),
        ];
    }
}
