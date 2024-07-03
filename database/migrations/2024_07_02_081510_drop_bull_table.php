<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropBullTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('bull');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('bull', function (Blueprint $table) {
            $table->id();
            $table->integer('id_bangsa');
            $table->string('kode_bull');
            $table->string('bull');
            $table->timestamps();
        });
    }
}