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
        Schema::create('distribusi', function (Blueprint $table) {
            $table->id();
            $table->char('id_bangsa')->nullable();
            $table->char('bangsa');
            $table->char('kode_batch');
            $table->char('kode_bull');
            $table->char('nama_bull');
            $table->date('tgl_distribusi');
            $table->integer('jml_distribusi');
            $table->char('tujuan_distribusi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribusi');
    }
};
