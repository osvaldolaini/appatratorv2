<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('contest_disciplines', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->nullable();
            $table->string('title')->nullable();
            $table->string('nick')->nullable();
            $table->string('code')->nullable();
            $table->string('slug')->nullable();
            $table->integer('order')->nullable();
            $table->foreignId('contest_id')
                ->constrained('contests')
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->nullable();
            $table->timestamps();
            $table->string('updated_by', 50)->nullable();
            $table->string('created_by', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contest_disciplines');
    }
};
