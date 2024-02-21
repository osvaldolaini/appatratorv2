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
        Schema::create('contest_questions', function (Blueprint $table) {
            $table->id();
            $table->dateTime('day')->nullable();
            $table->foreignId('user_id')
            ->constrained('users')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->foreignId('contest_matter_id')
                ->constrained('contest_matters')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('contest_user_id')
                ->constrained('contest_users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->integer('qtd')->nullable();
            $table->integer('hits')->nullable();
            $table->string('code')->nullable();
            $table->string('updated_by',50)->nullable();
            $table->string('created_by',50)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contest_questions');
    }
};
