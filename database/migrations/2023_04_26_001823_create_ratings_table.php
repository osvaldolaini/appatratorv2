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
        Schema::create('ratings', function (Blueprint $table) {
            $table->id();
            $table->integer('points')->nullable();
            $table->foreignId('user_id')
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->nullable();
            $table->foreignId('essay_user_id')
            ->constrained('essay_users')
            ->onUpdate('cascade')
            ->onDelete('cascade')
            ->nullable();
            $table->foreignId('pivot_skills_essay_id')
            ->constrained('pivot_skills_essays')
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
        Schema::dropIfExists('ratings');
    }
};
