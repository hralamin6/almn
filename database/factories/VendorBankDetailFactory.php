<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VendorBankDetail>
 */
class VendorBankDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'bank_name' => $this->faker->name,
            'account_holder_name' => $this->faker->phoneNumber,
            'account_number' => rand(111111110, 11111111111111),
        ];
    }
}
