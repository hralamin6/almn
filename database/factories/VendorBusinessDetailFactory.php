<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\VendorBusinessDetail>
 */
class VendorBusinessDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'shop_name' => $this->faker->name,
            'shop_mobile' => $this->faker->phoneNumber,
            'shop_address' => $this->faker->address,
            'shop_email' => $this->faker->safeEmail,
            'shop_pincode'=>rand(111111,11111111),        ];
    }
}
