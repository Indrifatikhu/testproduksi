<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateDistribusiTableAddContainerId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('distribusi', function (Blueprint $table) {
            $table->dropColumn('container');
            $table->integer('container_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('distribusi', function (Blueprint $table) {
            $table->dropColumn('container_id');
            $table->string('container');
        });
    }
}