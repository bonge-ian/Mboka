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
        $listings = Listing::chunk(
            50,
            fn ($listings) => $listings->each(
                fn (Listing $listing) => $listing->payments()->create(
                    Payment::factory()
                    ->set('user_id', $listing->user_id)
                    ->make()
                    ->toArray()
                )
            )
        );
    }
}
