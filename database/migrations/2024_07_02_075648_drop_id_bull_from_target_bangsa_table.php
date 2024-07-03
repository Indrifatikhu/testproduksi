<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropIdBullFromTargetBangsaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('target_bangsa', function (Blueprint $table) {
            $table->dropColumn('id_bull');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('target_bangsa', function (Blueprint $table) {
            $table->integer('id_bull')->nullable();
        });
    }
}