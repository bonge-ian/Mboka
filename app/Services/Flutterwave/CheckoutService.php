<?php

declare(strict_types=1);

namespace App\Services\Flutterwave;

use App\Services\Base\BaseService;
use Illuminate\Http\Client\RequestException;
use App\Domain\ValueObjects\Flutterwave\CheckoutPayload;

class CheckoutService extends BaseService
{
    public function __invoke(CheckoutPayload $payload) : string
    {
        $response = $this->request()
            ->post(
                url: 'payments',
                data: $payload->toArray()
            );

        if ($response->failed()) {
            throw new RequestException($response);
        }

        return $response->json('data.link');
    }
}
