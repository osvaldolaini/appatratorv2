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
        Schema::create('sub_matters', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->nullable();
            $table->string('title')->nullable();
            $table->string('nick')->nullable();
            $table->string('slug')->nullable();
            $table->string('code')->nullable();
            $table->integer('order')->nullable();
            $table->foreignId('matter_id')
                ->constrained('matters')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
            $table->string('updated_by',50)->nullable();
            $table->string('created_by',50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sub_matters');
    }
};
