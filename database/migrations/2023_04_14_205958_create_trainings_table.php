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
        Schema::create('trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('season_treinament_id')
            ->constrained('season_treinaments')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->nullable();
            $table->foreignId('exercise_id')
            ->constrained('exercises')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->nullable();
            $table->string('repeat')->nullable();
            $table->string('distance')->nullable();
            $table->time('time')->nullable();
            $table->timestamps();
            $table->date('day')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainings');
    }
};
