<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Click;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ClickSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        $clicks = Click::factory()
            ->count(1500)
            ->sequence(
                fn ($sequence) => [
                    'listing_id' => Listing::pluck('id')->random(),
                    'created_at' => $date = Carbon::now()->subDays(random_int(0, 40)),
                    'updated_at' => $date,
                ]
            )
            ->make();



        $clicks->chunk(300)
            ->each(
                fn ($clicks) =>  Click::insert(
                    array_map(function ($c) {

                        $c['created_at'] = Carbon::parse($c['created_at']);
                        $c['updated_at'] = Carbon::parse($c['updated_at']);

                        return $c;
                    }, $clicks->toArray())
                )
            );
    }
}
