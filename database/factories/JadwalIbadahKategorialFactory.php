<?php

namespace Database\Factories;

use App\Models\IbadahKategorial;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JadwalIbadahKategorial>
 */
class JadwalIbadahKategorialFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kategorial_id' => IbadahKategorial::factory(),
            'pelayan' => $this->faker->name(),
            'tanggal' => $this->faker->date(),
            'tema_ibadah' => $this->faker->paragraph(1),
            'bacaan1' => $this->faker->randomElement(['Mat', 'Mark', 'Luk', 'Yoh']) . ':' . rand(1, 2) . '-' . rand(3, 50),
            'bacaan2' => $this->faker->randomElement(['Mat', 'Mark', 'Luk', 'Yoh']) . ':' . rand(1, 2) . '-' . rand(3, 50),
            'bacaan3' => $this->faker->randomElement(['Mat', 'Mark', 'Luk', 'Yoh']) . ':' . rand(1, 2) . '-' . rand(3, 50),
            'pujian1' => 'KJ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian2' => 'KJ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian3' => 'KJ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian4' => 'KJ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian5' => 'KJ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian6' => 'KJ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian7' => 'KJ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian8' => 'KJ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian9' => 'KJ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian10' => 'KJ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
        ];
    }
}