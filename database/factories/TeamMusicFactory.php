<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TeamMusic>
 */
class TeamMusicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pemusik' => $this->faker->name(),
            'ppj1' => $this->faker->name(),
            'ppj2' => $this->faker->name(),
            'ppj3' => $this->faker->name(),
            'ppj4' => $this->faker->name()
        ];
    }
}