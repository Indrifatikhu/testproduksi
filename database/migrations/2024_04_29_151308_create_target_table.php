<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('target', function (Blueprint $table) {
            $table->id();
            $table->string('bulan');
            $table->integer('target_bulanan');
            $table->string('tahun');
            $table->integer('target_tahunan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('target');
    }
};
