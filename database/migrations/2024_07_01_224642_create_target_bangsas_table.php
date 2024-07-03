<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTargetBangsasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('target_bangsas', function (Blueprint $table) {
            $table->id();
            $table->integer('id_bangsa');
            $table->integer('id_bull');
            $table->integer('target_bulanan');
            $table->integer('target_tahunan');
            $table->integer('bulan');
            $table->integer('tahun');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('target_bangsas');
    }
}
