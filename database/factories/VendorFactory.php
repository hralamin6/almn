<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vendor>
 */
class VendorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => $this->faker->name,
            'mobile' => $this->faker->phoneNumber,
            'email' => $this->faker->safeEmail,
            'address' => $this->faker->address,
            'pin_code' => rand(1000, 10000000),
            'status' => rand(0, 1),

        ];
    }
}
