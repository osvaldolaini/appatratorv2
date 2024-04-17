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
        Schema::table('contest_users', function (Blueprint $table) {
            $table->boolean('cycles')
            ->after('contest_id')
            ->default(0);
            $table->integer('qtd_cycles')->after('cycles')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('contest_users', function (Blueprint $table) {
            $table->dropColumn(array('cycles','qtd_cycles'));
        });
    }
};
