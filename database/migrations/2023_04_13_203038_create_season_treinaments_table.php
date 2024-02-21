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
        Schema::create('season_treinaments', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->nullable();
            $table->dateTime('day')->nullable();
            $table->foreignId('user_id')
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->nullable();
            $table->foreignId('season_id')
            ->constrained('seasons')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('season_treinaments');
    }
};
