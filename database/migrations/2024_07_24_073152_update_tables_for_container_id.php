<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTablesForContainerId extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('distribusi', function (Blueprint $table) {
            $table->dropColumn('container_id');
        });

        Schema::table('produksi', function (Blueprint $table) {
            $table->integer('container_id')->nullable()->after('konsentrasi');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produksi', function (Blueprint $table) {
            $table->dropColumn('container_id');
        });

        Schema::table('distribusi', function (Blueprint $table) {
            $table->integer('container_id')->nullable()->after('customer_id');
        });
    }
}

