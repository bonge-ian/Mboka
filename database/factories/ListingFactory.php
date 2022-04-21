<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Company;
use App\Models\Category;
use Illuminate\Support\Arr;
use App\Domain\States\ListingTypeEnum;
use App\Domain\States\ListingStatusEnum;
use App\Domain\States\EmployeeAvailabilityEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Listing>
 */
class ListingFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition() : array
    {
        $date = $this->faker->dateTimeBetween(
            startDate: "-3 months",
            endDate:"now",
            timezone: 'Africa/Nairobi'
        );

        $employee_availability = Arr::random(array: EmployeeAvailabilityEnum::values());

        return [
            'created_at' => $date,
            'updated_at' => $date,
            'user_id' => User::factory(),
            'apply_url' => $this->faker->url(),
            'company_id' => Company::factory(),
            'category_id' => Category::factory(),
            'employee_availability' => $employee_availability,
            'on_site_days' => function () use ($employee_availability) {
                $days = match ($employee_availability) {
                    (EmployeeAvailabilityEnum::REMOTE)->value => null,
                    (EmployeeAvailabilityEnum::ONSITE)->value => 5,
                    default => $this->faker->numberBetween(1, 5)
                };

                return $days;
            },
            'listing_type' => Arr::random(ListingTypeEnum::values()),
            'status' => Arr::random(ListingStatusEnum::values()),
            'perks' => $this->faker->paragraphs(random_int(1, 4), true),
            'is_pinned' => $this->faker->boolean(chanceOfGettingTrue: 30),
            'title' => ucwords($this->faker->words(random_int(2, 5), true)),
            'experience' =>  $this->faker->paragraphs(random_int(1, 4), true),
            'overview' => $this->faker->paragraphs(random_int(2, 6), true),
            'is_highlighted' => $isHighlighted = $this->faker->boolean(chanceOfGettingTrue: 34),
            'highlight_color' => ($isHighlighted) ? $this->faker->hslColor() : null,
            'location' => $this->faker->city() . ', ' . $this->faker->country(),
            'show_logo' => $this->faker->boolean(chanceOfGettingTrue: 60),
        ];
    }
}
