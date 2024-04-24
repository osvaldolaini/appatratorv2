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
        Schema::create('modules', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('active')->nullable();
            $table->boolean('type')->nullable();
            $table->foreignId('course_id')
            ->nullable()
            ->constrained('courses')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->longText('description')->nullable();
            $table->string('image_path')->nullable();
            $table->string('code')->nullable();
            $table->timestamps();
            $table->string('created_by',50)->nullable();
            $table->string('updated_by',50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('modules');
    }
};
