<?php

namespace Database\Factories;

use App\Models\IbadahMingguAnak;
use App\Models\TeamMusic;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JadwalIbadahMingguAnak>
 */
class JadwalIbadahMingguAnakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ibadah_anak_id' => IbadahMingguAnak::factory(),
            'team_music_id' => TeamMusic::factory(),
            'tanggal' => $this->faker->date(),
            'pelayan' => $this->faker->name(),
            'tema_ibadah' => $this->faker->word(),
            'bacaan1' => $this->faker->randomElement(['Mat', 'Luk', 'Mar', 'Yoh']) . ':' . rand(1, 5) . '-' . rand(5, 50),
            'bacaan2' => $this->faker->randomElement(['Mat', 'Luk', 'Mar', 'Yoh']) . ':' . rand(1, 5) . '-' . rand(5, 50),
            'bacaan3' => $this->faker->randomElement(['Mat', 'Luk', 'Mar', 'Yoh']) . ':' . rand(1, 5) . '-' . rand(5, 50),
        ];
    }
}