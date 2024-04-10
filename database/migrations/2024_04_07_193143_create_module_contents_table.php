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
        Schema::create('module_contents', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('youtube_link')->nullable();
            $table->integer('order')->nullable();
            $table->boolean('active')->nullable();
            $table->string('type_content')->nullable();
            $table->boolean('type')->nullable();
            $table->foreignId('module_id')
            ->nullable()
            ->constrained('modules')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->string('video')->nullable();
            $table->longText('description')->nullable();
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
        Schema::dropIfExists('module_contents');
    }
};
