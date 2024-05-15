<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Word>
 */
class WordFactory extends Factory
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
            'meaning' => $this->faker->name,
            'male_name' => $this->faker->name,
            'female_name' => $this->faker->name,
            'gender' => $this->faker->randomElement(['female', 'male']),
            'pop' => $this->faker->randomElement(['noun', 'verb', 'adjective', 'adverb']),
        ];
    }
}
