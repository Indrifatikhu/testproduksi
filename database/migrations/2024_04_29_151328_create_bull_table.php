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
        Schema::create('bull', function (Blueprint $table) {
            $table->id();
            $table->char('bangsa_id');
            $table->char('kode_bull');
            $table->char('nama_bull');
            $table->date('tgl_lahir');
            $table->char('asal');
            $table->date('tgl_terima');
            $table->char('kondisi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bull');
    }
};
