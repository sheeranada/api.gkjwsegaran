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
        Schema::create('team_music', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('pemusik');
            $table->string('ppj1')->nullable();
            $table->string('ppj2')->nullable();
            $table->string('ppj3')->nullable();
            $table->string('ppj4')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('team_music');
    }
};