<?php

namespace Database\Factories;

use App\Models\TempatIbadah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IbadahMinggu>
 */
class IbadahMingguFactory extends Factory
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
            'pagi_sore' => $this->faker->randomElement(['pagi', 'sore']),
            'minggu_ke' => $this->faker->randomElement(['I', 'II', 'III', 'IV', 'V']),
            'jam' => $this->faker->time(),
            'bahasa' => $this->faker->randomElement(['BAHASA INDONESIA', 'BAHASA JAWA']),
        ];
    }
}