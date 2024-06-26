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
        Schema::dropIfExists('distribusi');
        Schema::create('distribusi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_produksi');
            $table->date('tanggal');
            $table->char('jumlah');
            $table->char('tujuan');
            $table->char('container');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
    }
};
