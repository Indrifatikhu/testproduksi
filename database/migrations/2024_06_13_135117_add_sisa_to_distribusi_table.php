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
        Schema::table('distribusi', function (Blueprint $table) {
            $table->integer('sisa')->nullable()->after('container');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('distribusi', function (Blueprint $table) {
            $table->dropIfExists('sisa');
        });
    }
};
