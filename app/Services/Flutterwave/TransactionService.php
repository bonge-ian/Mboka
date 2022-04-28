<?php

declare(strict_types=1);

namespace App\Services\Flutterwave;

use App\Services\Base\BaseService;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Client\RequestException;
use App\Domain\ValueObjects\Flutterwave\TransactionPayload;
use App\Domain\ValueObjects\Flutterwave\TransactionResponse;
use App\Domain\ValueObjects\Factories\TransactionResponseFactory;
use App\Domain\ValueObjects\Flutterwave\Collections\TransactionResponseCollection;

class TransactionService extends BaseService
{
    public function all(TransactionPayload $transactionPayload): TransactionResponseCollection {
        $response = $this->request()->get('', [
            'from' => $transactionPayload->from->format('Y-m-d'),
            'to' => $transactionPayload->to->format('Y-m-d'),
            'customer_email' => $transactionPayload->customerEmail,
            'status' => $transactionPayload->status,
            'page' => $transactionPayload->page,
            'tx_ref' => $transactionPayload->transactionCode
        ]);

        if ($response->failed()) {
            Log::error("Failed to get transactions");

            throw new RequestException($response);
        }

        return new TransactionResponseCollection(
            $response->collect('data')->each(
                fn ($item) => TransactionResponseFactory::make($item)
            )
        );
    }

    public function verify(int $id): TransactionResponse
    {
        $response = $this->request()
            ->acceptJson()
            ->get("{$id}/verify");


        if ($response->failed()) {
            Log::error(
                "Failed to verify transaction of id: {$id}",
                [
                    'message' => $response->json('message')
                ]
            );

            throw new RequestException($response);
        }

        return TransactionResponseFactory::make($response->json('data'));
    }

    public function verifyByTransactionCode(string $code): TransactionResponse
    {
        $response = $this->request()
            ->acceptJson()
            ->get("verify_by_reference", [
                'tx_ref' => $code
            ]);


        if ($response->failed()) {
            Log::error(
                "Failed to verify transaction of reference: {$code}",
                [
                    'message' => $response->json('message')
                ]
            );

            throw new RequestException($response);
        }

        return TransactionResponseFactory::make($response->json('data'));
    }
}
