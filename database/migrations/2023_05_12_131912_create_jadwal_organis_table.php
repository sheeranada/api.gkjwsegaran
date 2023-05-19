<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jadwal_organis', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('team_music_id')->constrained('team_music')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('tanggal');
            $table->string('jam');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_organis');
    }
};