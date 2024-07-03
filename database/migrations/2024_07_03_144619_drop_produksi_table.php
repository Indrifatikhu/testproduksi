<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropProduksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('produksi');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('produksi', function (Blueprint $table) {
            $table->id();
            $table->integer('id_bull');
            $table->string('kode_batch');
            $table->date('tanggal');
            $table->integer('produksi');
            $table->string('ptm');
            $table->string('konsentrasi');
            $table->timestamps();
        });
    }
}