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
        Schema::create('contest_planning_daily_users', function (Blueprint $table) {
            $table->id();
            $table->integer('minutes')->nullable();
            $table->integer('order')->nullable();
            $table->string('type')->nullable();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('contest_user_id')
                ->constrained('contest_users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('contest_discipline_id')
                ->constrained('contest_disciplines')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('contest_planning_user_id')
                ->constrained('contest_planning_users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('code')->nullable();
            $table->string('created_by',50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contest_planning_daily_users');
    }
};
