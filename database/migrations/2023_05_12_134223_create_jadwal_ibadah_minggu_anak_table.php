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
        Schema::create('jadwal_ibadah_minggu_anak', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('ibadah_anak_id')->constrained('ibadah_minggu_anak')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('team_music_id')->constrained('team_music')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('tanggal');
            $table->string('pelayan');
            $table->string('tema_ibadah');
            $table->string('bacaan1')->nullable();
            $table->string('bacaan2')->nullable();
            $table->string('bacaan3')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_ibadah_minggu_anak');
    }
};