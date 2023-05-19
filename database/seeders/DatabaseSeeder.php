<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\IbadahKategorial;
use App\Models\Stola;
use App\Models\TeamMusic;
use App\Models\IbadahMinggu;
use App\Models\TempatIbadah;
use App\Models\MajelisJemaat;
use App\Models\IbadahKeluarga;
use Illuminate\Database\Seeder;
use App\Models\IbadahMingguAnak;
use App\Models\JadwalIbadahKategorial;
use App\Models\JadwalIbadahMinggu;
use App\Models\JadwalIbadahMingguAnak;
use App\Models\JadwalOrganis;
use App\Models\WilayahPelayanan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        MajelisJemaat::factory(20)->create();
        WilayahPelayanan::factory(10)->create();
        IbadahKeluarga::factory(20)->create();
        Stola::factory(5)->create();
        TeamMusic::factory(10)->create();
        TempatIbadah::factory(8)->create();
        IbadahMingguAnak::factory(4)->create();
        IbadahMinggu::factory(5)->create();
        JadwalOrganis::factory(30)->create();
        JadwalIbadahMinggu::factory(30)->create();
        JadwalIbadahMingguAnak::factory(30)->create();
        IbadahKategorial::factory(10)->create();
        JadwalIbadahKategorial::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}