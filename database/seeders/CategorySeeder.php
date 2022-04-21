<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * @return void
     */
    public function run(): void
    {
        foreach ($this->categories() as $category) {
            Category::create([
                'name' => $category
            ]);
        }
    }

    protected function categories(): array
    {
        return [
            'HR',
            'NGO',
            'Admin',
            'Legal',
            'Other',
            'Design',
            'Writing',
            'Fashion',
            'Tourism',
            'Education',
            'Marketing',
            'Automative',
            'Hospitality',
            'Real Estate',
            'Recruitment',
            'Health Care',
            'Construction',
            'IT & Telecoms',
            'Manufacturing',
            'Banking/Finance',
            'Customer Support',
        ];
    }
}
