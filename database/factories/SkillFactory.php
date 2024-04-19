<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Skill>
 */
class SkillFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(), // Generating a random title
            'display' => $this->faker->boolean(), // Randomly sets display to either 0 or 1
            'percentage' => $this->faker->numberBetween(1, 100),
        ];
    }
}
