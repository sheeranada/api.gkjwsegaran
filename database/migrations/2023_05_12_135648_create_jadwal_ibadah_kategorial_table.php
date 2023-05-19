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
        Schema::create('jadwal_ibadah_kategorial', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('kategorial_id')->constrained('ibadah_kategorial')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('pelayan');
            $table->string('tanggal');
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
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_ibadah_kategorial');
    }
};