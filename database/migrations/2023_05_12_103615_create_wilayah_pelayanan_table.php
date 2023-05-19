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
        Schema::create('wilayah_pelayanan', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('ketua_wilayah')->constrained('majelis_jemaat')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('nama_wilayah');
            $table->string('area');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wilayah_pelayanan');
    }
};