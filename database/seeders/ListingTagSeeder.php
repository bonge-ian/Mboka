<?php

namespace Database\Seeders;

use App\Models\Tag;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ListingTagSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $listings = Listing::chunk(
            50,
            fn ($listings) => $listings->each(
                fn ($listing) => $listing->tags()->sync(
                    Tag::inRandomOrder()
                        ->limit(random_int(1, 5))
                        ->get('id')
                )
            )
        );
    }
}
