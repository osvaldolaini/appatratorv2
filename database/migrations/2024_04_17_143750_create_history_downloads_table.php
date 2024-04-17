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
        Schema::create('history_downloads', function (Blueprint $table) {
            $table->id();
            $table->string('path')->nullable();
            $table->foreignId('user_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('course_id')
                ->nullable()
                ->constrained('courses')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('module_id')
                ->nullable()
                ->constrained('modules')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('content_id')
                ->nullable()
                ->constrained('module_contents')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_downloads');
    }
};
