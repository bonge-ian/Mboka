<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Listing;
use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ListingSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Listing::factory()
            ->count(100)
            ->sequence(
                fn ($sequence) => [
                    'user_id' => User::get('id')->random(),
                    'category_id' => Category::get('id')->random(),
                    'company_id' => Company::get('id')->random()
                ]
            )
            ->create();
    }
}
