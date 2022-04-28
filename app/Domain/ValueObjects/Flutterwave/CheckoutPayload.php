<?php

declare(strict_types=1);

namespace App\Domain\ValueObjects\Flutterwave;

use Illuminate\Support\Str;
use App\Domain\ValueObjects\Customer;
use App\Domain\ValueObjects\Contracts\ValueObject;

class CheckoutPayload implements ValueObject
{
    public string $currencty;

    public string $paymentOptions;

    public string $transactionCode;

    public function __construct(
        public readonly float $amount,
        public readonly string $redirectUrl,
        public readonly Customer $customer,
        public readonly ?array $meta = null,
        public readonly ?array $customizations = null
    )
    {
        $this->transactionCode = 'MBOKA-' . Str::of(Str::random(10))->upper();
        $this->currency = config('services.flutterwave.currency');
        $this->paymentOptions = config('services.flutterwave.payment_options');
    }

    public function toArray() : array
    {
        return [
            'tx_ref' => $this->transactionCode,
            'amount' => $this->amount,
            'currency' => $this->currency,
            'redirect_url' => $this->redirectUrl,
            'customer' => [
                'name' => $this->customer->name,
                'email' => $this->customer->email,
                'phonenumber' => $this->customer?->phone ?? null
            ],
            'payment_options' => $this->paymentOptions,
            'meta' => $this->meta,
            'customizations' => $this->customizations
        ];
    }
}
