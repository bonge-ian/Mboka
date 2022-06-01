<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
use App\Models\Payment;
use Illuminate\Database\Seeder;

class PaymentSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {

        Payment::factory()
            ->count(100)
            ->sequence(
                function($sequence) {
                $listing = Listing::query()
                    ->select(['id', 'user_id'])
                    ->inRandomOrder()
                    ->limit(1)
                    ->first();

                    return [
                    'listing_id' => $listing->id,
                    'user_id' => $listing->user_id,
                    ];
                }
            )
            ->create();
    }
}
