<?php

namespace Database\Factories;

use App\Models\WilayahPelayan;
use App\Models\WilayahPelayanan;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IbadahKeluarga>
 */
class IbadahKeluargaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'wilayah_pelayanan_id' => WilayahPelayanan::factory(),
            'tempat' => $this->faker->city(),
            'jam' => $this->faker->time(),
            'tanggal' => $this->faker->date(),
            'pelayan' => $this->faker->name()
        ];
    }
}