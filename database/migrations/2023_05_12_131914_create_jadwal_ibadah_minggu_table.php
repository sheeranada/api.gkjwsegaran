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
        Schema::create('jadwal_ibadah_minggu', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('ibadah_minggu_id')->constrained('ibadah_minggu')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('pelayan_id')->constrained('majelis_jemaat')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('stola_id')->constrained('stola')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('tempat_ibadah_id')->constrained('tempat_ibadah')->cascadeOnDelete()->cascadeOnUpdate();
            $table->foreignUuid('organis_id')->constrained('jadwal_organis')->cascadeOnDelete()->cascadeOnUpdate();
            $table->date('tanggal');
            $table->string('tema_ibadah')->nullable();
            $table->string('bacaan1')->nullable();
            $table->string('bacaan2')->nullable();
            $table->string('bacaan3')->nullable();
            $table->string('pujian1')->nullable();
            $table->string('pujian2')->nullable();
            $table->string('pujian3')->nullable();
            $table->string('pujian4')->nullable();
            $table->string('pujian5')->nullable();
            $table->string('pujian6')->nullable();
            $table->string('pujian7')->nullable();
            $table->string('pujian8')->nullable();
            $table->string('pujian9')->nullable();
            $table->string('pujian10')->nullable();
            $table->string('pujian11')->nullable();
            $table->string('pujian12')->nullable();
            $table->string('pujian13')->nullable();
            $table->string('pujian14')->nullable();
            $table->string('pujian15')->nullable();
            $table->longText('catatan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_ibadah_minggu');
    }
};