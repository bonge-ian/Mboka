<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition() : array
    {
        return [
            'website' => $this->faker->unique()->url(),
            'name' => $this->faker->unique()->company(),
            'headquarters' => $this->faker->city() . ', ' . $this->faker->country(),
            'bio' => $this->faker->sentences(random_int(1, 3), true),
            'logo' => basename($this->faker->image(storage_path('app/public/companies/assets'))),
        ];
    }
}
