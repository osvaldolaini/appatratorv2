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
        Schema::create('contest_controller_cycle_users', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->default(0);
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('planning_cycle_id')
                ->constrained('contest_planning_cycles_users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('created_by',50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contest_controller_cycle_users');
    }
};
