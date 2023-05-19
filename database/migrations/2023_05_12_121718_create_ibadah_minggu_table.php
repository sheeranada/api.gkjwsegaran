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
        Schema::create('ibadah_minggu', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('tempat_ibadah_id')->constrained('tempat_ibadah')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('pagi_sore');
            $table->string('minggu_ke');
            $table->string('jam');
            $table->string('bahasa');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ibadah_minggu');
    }
};