<?php

namespace Database\Factories;

use App\Models\MajelisJemaat;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WilayahPelayanan>
 */
class WilayahPelayananFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ketua_wilayah' => MajelisJemaat::factory(),
            'nama_wilayah' => $this->faker->randomElement(['MARENCO', 'TALOK', 'SEGARAN 1', 'SEGARAN 2', 'DLANGGU']),
            'area' => $this->faker->streetAddress(),
        ];
    }
}