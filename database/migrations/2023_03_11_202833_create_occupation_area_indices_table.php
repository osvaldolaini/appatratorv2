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
        Schema::create('occupation_area_indices', function (Blueprint $table) {
            $table->id();
            $table->boolean('status')->nullable();
            $table->string('title')->nullable();
            $table->string('nick')->nullable();
            $table->string('slug')->nullable();
            $table->string('code')->nullable();
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
        Schema::dropIfExists('occupation_area_indices');
    }
};
