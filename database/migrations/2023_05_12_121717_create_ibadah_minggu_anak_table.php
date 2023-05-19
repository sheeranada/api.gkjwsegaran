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
        Schema::create('ibadah_minggu_anak', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('tempat_ibadah_id')->constrained('tempat_ibadah')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('kelas')->nullable(); //balita prata madya remaja
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
        Schema::dropIfExists('ibadah_minggu_anak');
    }
};