<?php

namespace Database\Factories;

use App\Models\IbadahMinggu;
use App\Models\JadwalOrganis;
use App\Models\MajelisJemaat;
use App\Models\Stola;
use App\Models\TeamMusic;
use App\Models\TempatIbadah;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\JadwalIbadahMinggu>
 */
class JadwalIbadahMingguFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'ibadah_minggu_id' => IbadahMinggu::factory(),
            'pelayan_id' => MajelisJemaat::factory(),
            'stola_id' => Stola::factory(),
            'tempat_ibadah_id' => TempatIbadah::factory(),
            'organis_id' => JadwalOrganis::factory(),
            'tanggal' => $this->faker->date(),
            'tema_ibadah' => $this->faker->title(),
            'bacaan1' => 'Mazmur :' . rand(1, 50),
            'bacaan2' => 'Ayub :' . rand(1, 50),
            'bacaan3' => 'Lukas :' . rand(1, 50),
            'pujian1' => 'KJ ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian2' => 'KJ ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian3' => 'KJ ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian4' => 'KJ ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian5' => 'KJ ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian6' => 'KJ ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian7' => 'KJ ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian8' => 'KJ ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian9' => 'KJ ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian10' => 'KJ ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian11' => 'KJ ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian12' => 'KJ ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian13' => 'KJ ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian14' => 'KJ ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'pujian15' => 'KJ ' . rand(1, 474) . ':' . rand(1, 2) . '-' . rand(2, 3),
            'catatan' => $this->faker->paragraph(3),
        ];
    }
}