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
        Schema::table('bull', function (Blueprint $table) {
            $table->date('tanggal_lahir')->nullable();
            $table->string('status')->nullable();
            $table->text('keterangan')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bull', function (Blueprint $table) {
            $table->dropColumn(['tanggal_lahir', 'status', 'keterangan']);
        });
    }
};