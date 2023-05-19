<?php

namespace Database\Factories;

use App\Models\TempatIbadah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IbadahMingguAnak>
 */
class IbadahMingguAnakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tempat_ibadah_id' => TempatIbadah::factory(),
            'kelas' => $this->faker->jobTitle(),
            'jam' => $this->faker->time(),
            'bahasa' => $this->faker->languageCode(),
        ];
    }
}