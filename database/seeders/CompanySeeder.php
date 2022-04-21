<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CompanySeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        Company::factory()
            ->count(20)
            ->create();
    }
}
