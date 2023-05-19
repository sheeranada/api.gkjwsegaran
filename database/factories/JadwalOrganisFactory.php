<?php

namespace Database\Factories;

use App\Models\TeamMusic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JadwalOrganis>
 */
class JadwalOrganisFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'team_music_id' => TeamMusic::factory(),
            'tanggal' => $this->faker->date(),
            'jam' => $this->faker->time(),
        ];
    }
}