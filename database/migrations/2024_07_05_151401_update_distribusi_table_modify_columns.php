<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('distribusi', function (Blueprint $table) {
            if (!Schema::hasColumn('distribusi', 'provinsi_id')) {
                $table->unsignedBigInteger('provinsi_id')->nullable();
            }
            if (!Schema::hasColumn('distribusi', 'kabupaten_id')) {
                $table->unsignedBigInteger('kabupaten_id')->nullable();
            }
            if (Schema::hasColumn('distribusi', 'tujuan_distribusi')) {
                $table->dropColumn('tujuan_distribusi');
            }
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
            if (Schema::hasColumn('distribusi', 'provinsi_id')) {
                $table->dropColumn('provinsi_id');
            }
            if (Schema::hasColumn('distribusi', 'kabupaten_id')) {
                $table->dropColumn('kabupaten_id');
            }
            if (!Schema::hasColumn('distribusi', 'tujuan_distribusi')) {
                $table->string('tujuan_distribusi')->nullable();
            }
        });
    }
};