<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Tag::factory()
            ->count(25)
            ->create();
    }
}
