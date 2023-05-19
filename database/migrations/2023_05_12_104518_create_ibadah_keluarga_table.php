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
        Schema::create('ibadah_keluarga', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('wilayah_pelayanan_id')->constrained('wilayah_pelayanan')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('pelayan');
            $table->string('tempat');
            $table->string('jam');
            $table->string('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ibadah_keluarga');
    }
};