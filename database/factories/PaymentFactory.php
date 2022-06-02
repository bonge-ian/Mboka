<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Domain\Helpers\Money;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Payment>
 */
class PaymentFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $payment_methods = ["card", "mpesa"];

        $date = $this->faker->dateTimeBetween(
            startDate: "-3 months",
            endDate: "now",
            timezone: 'Africa/Nairobi'
        );

        return [
            'code' =>  $this->faker->swiftBicNumber(),
            'flw_id' => $this->faker->ean8(),
            'amount' => new Money($this->faker->randomFloat(2, 1999, 5000)),
            'status' => 'successful',
            'paid_at' => $date,
            'created_at' => $date,
            'updated_at' => $date,
            'payment_method' => $payment_methods[$this->faker->numberBetween(0, 1)],
        ];
    }
}
