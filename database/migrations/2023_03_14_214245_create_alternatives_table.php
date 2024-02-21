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
        Schema::create('alternatives', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->nullable();
            $table->longText('text')->nullable();
            $table->boolean('correct')->nullable();
            $table->integer('qtd_clicks')->nullable();
            $table->string('code')->nullable();
            $table->foreignId('question_id')
            ->constrained('questions')
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
        Schema::dropIfExists('alternatives');
    }
};
