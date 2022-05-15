<?php

namespace Database\Seeders;

use App\Models\Listing;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use CyrildeWit\EloquentViewable\Visitor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ListingViewSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Listing::chunk(
            50,
            fn ($listings) => $listings->each(
                function ($listing) {
                    for ($i = 0; $i <= random_int(10, 60); $i++) {
                        $listing->views()->create([
                            'visitor'=> Str::random(80),
                            'viewed_at' => now()->subDays($i),
                        ]);
                    }
                }
            )
        );
    }
}
