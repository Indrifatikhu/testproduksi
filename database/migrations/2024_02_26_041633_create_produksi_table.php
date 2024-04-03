<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('produksi', function (Blueprint $table) {
            $table->id();
            $table->string(DB::raw("CONCAT(kode_bull, kode_batch)"))->nullable();
            $table->string('bangsa')->nullable();
            $table->string('nama_bull')->nullable();
            $table->char('kode_bull')->nullable();
            $table->char('kode_batch')->nullable();
            $table->integer('produksi')->nullable();
            $table->string('ptm')->nullable();
            $table->char('konsentrasi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produksi');
    }
};
