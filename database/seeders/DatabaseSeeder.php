<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /** 
     * @return void
     */
    public function run() : void
    {
        $this->call([ // must follow this order
            UserSeeder::class,
            CategorySeeder::class,
            TagSeeder::class,
            CompanySeeder::class,
            ListingSeeder::class,
            ListingTagSeeder::class,
        ]);
    }
}
