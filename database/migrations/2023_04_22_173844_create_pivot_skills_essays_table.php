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
        Schema::create('pivot_skills_essays', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->nullable();
            $table->foreignId('skill_id')
            ->constrained('skills')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->nullable();
            $table->foreignId('essay_id')
            ->constrained('essays')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->nullable();
            $table->integer('points')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot_skills_essays');
    }
};
