<?php

declare(strict_types=1);

namespace App\Services\Base;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\PendingRequest;

abstract class BaseService
{
    public function __construct(
        protected string $url,
        protected string $token,
        protected int $timeout = 10,
        protected ?int $retryTimes = null,
        protected ?int $retryInterval = null
    ) {
    }

    public function request(): PendingRequest
    {
        $request =  Http::withToken(
            token: $this->token
        )->baseUrl(
            url: $this->url
        )->timeout(
            seconds: $this->timeout
        );

        if (!is_null($this->retryTimes) && !is_null($this->retryInterval)) {
            $request->retry(
                times: $this->retryTimes,
                sleep: $this->retryInterval
            );
        }

        return $request;
    }
}
