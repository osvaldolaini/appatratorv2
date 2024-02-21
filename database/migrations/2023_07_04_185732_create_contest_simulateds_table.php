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
        Schema::create('contest_simulateds', function (Blueprint $table) {
            $table->id();
                $table->dateTime('day')->nullable();
                $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                $table->foreignId('contest_user_id')
                ->constrained('contest_users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
                $table->integer('qtd')->nullable();
                $table->integer('hits')->nullable();
                $table->integer('misses')->nullable();
                $table->integer('guesses')->nullable();
                $table->integer('blanks')->nullable();
                $table->decimal('grade',10,2)->nullable();
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
        Schema::dropIfExists('contest_simulateds');
    }
};
